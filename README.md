# PHP DateInterval timezone bug

Yesterday I observed a weird [`DateInterval`](http://php.net/manual/en/class.dateinterval.php) bug where adding 5 weeks would always equal 35 days but the difference in months and days would not be correct.

After some digging I figured out it was related to timezones and only affected timezones ranging from `Europe/London` eastward all the way to `Pacific/Auckland`, however as soon as I used `Pacific/Honolulu` the issue was gone.

### Test findings

All the tests in `tests/Timezones/America` and `tests/Timezones/Atlantic` pass. Another weird thing is that `Europe/London` passes all tests where it does not adhere to daylight savings time (`UTC+01:00`).

From this I draw a conclusion that all timezones that are greater than `UTC+00:00` fail because of this additional time.

#### Update:
My work colleague found out that this feature worked correctly in PHP [5.3.0](http://php.net/releases/5_3_0.php), [5.3.1](http://php.net/releases/5_3_1.php) and [5.3.2](http://php.net/releases/5_3_2.php), however in [5.3.3](http://php.net/releases/5_3_3.php) we can already observe this bug in action. [See for yourself](https://3v4l.org/cupQV).

### Example of the problem

```php
<?php

date_default_timezone_set('UTC');

$date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-04-01 00:00:00'); // 2019-04-01 00:00:00.0 UTC (+00:00)
$date2 = clone $date1;
$date2->modify('+5 week'); // 2019-05-06 00:00:00.0 UTC (+00:00)
$differenceDateInterval = $date1->diff($date2); // interval: + 1m 5d; days: 35
print_r($differenceDateInterval);
```
This prints
```
DateInterval Object
(
    [y] => 0
    [m] => 1
    [d] => 5 <-- this is correct
    [h] => 0
    [i] => 0
    [s] => 0
    [f] => 0
    [weekday] => 0
    [weekday_behavior] => 0
    [first_last_day_of] => 0
    [invert] => 0
    [days] => 35 <--- note the amount of 35 days
    [special_type] => 0
    [special_amount] => 0
    [have_weekday_relative] => 0
    [have_special_relative] => 0
)

```
```php
<?php

date_default_timezone_set('Europe/London');

$date3 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-04-01 00:00:00'); //  2019-04-01 00:00:00.0 Europe/London (+01:00)
$date4 = clone $date3;
$date4->modify('+5 week'); // 2019-05-06 00:00:00.0 Europe/London (+01:00)
$differenceDateInterval2 = $date3->diff($date4); // interval: + 1m 4d; days 35
```
This prints
```
DateInterval Object
(
    [y] => 0
    [m] => 1
    [d] => 4 <-- this is wrong and should be 5
    [h] => 0
    [i] => 0
    [s] => 0
    [f] => 0
    [weekday] => 0
    [weekday_behavior] => 0
    [first_last_day_of] => 0
    [invert] => 0
    [days] => 35 <--- this is still the correct amount of 35 days
    [special_type] => 0
    [special_amount] => 0
    [have_weekday_relative] => 0
    [have_special_relative] => 0
)
```
### Why is this such an issue?

Because when we add the `DateInterval` with the `Europe/London` timezone to a `DateTime` that also has `Europe/London` the addition is wrong and therefore unreliable.
```php
<?php

date_default_timezone_set('Europe/London');

$date5 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-04-01 00:00:00'); // 2019-04-01 00:00:00.0 Europe/London (+01:00)
$date6 = clone $date5;
$date6->modify('+5 week'); //  2019-05-06 00:00:00.0 Europe/London (+01:00)
$differenceDateInterval3 = $date5->diff($date6); // interval: + 1m 4d; days 35
$date7 = clone $date5;
$date7->add($differenceDateInterval3); // 2019-05-05 00:00:00.0 Europe/London (+01:00)
print_r($differenceDateInterval3);
print_r($date7);
```
This prints
```
DateInterval Object
(
    [y] => 0
    [m] => 1
    [d] => 4 <-- this is wrong and should be 5
    [h] => 0
    [i] => 0
    [s] => 0
    [f] => 0
    [weekday] => 0
    [weekday_behavior] => 0
    [first_last_day_of] => 0
    [invert] => 0
    [days] => 35 <--- this is still the correct amount of 35 days
    [special_type] => 0
    [special_amount] => 0
    [have_weekday_relative] => 0
    [have_special_relative] => 0
)
```
and
```
DateTime Object
(
    [date] => 2019-05-05 00:00:00.000000
    [timezone_type] => 3
    [timezone] => Europe/London
)
```
Even though it __SHOULD__ be 
```
DateTime Object
(
    [date] => 2019-05-06 00:00:00.000000
    [timezone_type] => 3
    [timezone] => Europe/London
)
```

### Test yourself

Check the tests in the `tests` directory of this repo and run them with `phpunit`.

## NOTES

* I found that the [DateInterval tests in php-src](https://github.com/php/php-src/blob/master/ext/date/tests/DateInterval_format.phpt#L13) use `date_default_timezone_set('UTC')`. Maybe that's why nobody from the PHP core dev team never spotted this bug.
* It is _probably related_ to this [bug](https://bugs.php.net/bug.php?id=52480) from 2010 (that still has not been fixed :scream:).
