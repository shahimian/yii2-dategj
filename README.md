Date GJ
=======
it convert Gregorian date to Jalali calendar one.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shahimian/yii2-dategj "*"
```

or add

```
"shahimian/yii2-dategj": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by normally:

```php
<?= \shahimian\dategj\DateGJ ?>
```
## Method Details
You use various methods in this class presented in list below:

**public static string gj($datetime : string)**
gets `$datetime` it formats `YYYY-MM-DD` as Gregorian date and converting that same format as Jalali date.

**public static Array convertor($datetime : string)**
gets argument with upper format and converting as array. it contains 3 cells for year, month and day.

**public static integer month($datetime : string)**
gets argument and returning month number.

**public static string month_name($month : integer)**
gets month number and returning month name as farsi language.

**public static string full_date($datetime : string)**
return full date contains year, month and day as farsi language.

**public static string weekday($datetime : string)**
return a day of the week as farsi language.
