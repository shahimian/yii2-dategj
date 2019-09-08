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
<?= $dt = \Yii::createObject([
    'class' => \shahimian\dategj\DateGJ::className(),
    'datetime' => '2019-09-08 11:56', /* format YYYY-MM-DD HH:MM */
]); ?>
```
You can set another value in `$dt->datetime` later if you want.

## Method Details
You use various methods in this class presented in list below:

**public string gj()**

gets `$dt->datetime` it formats `YYYY-MM-DD HH:MM` as Gregorian date and converting that same format as Jalali date.

**public Array convertor()**

gets argument with upper format and converting as array. it contains 3 cells for year, month and day.

**public integer month()**

gets argument and returning month number.

**public string month_name($month : integer)**

gets month number and returning month name as farsi language.

**public string full_date()**

return full date contains year, month and day as farsi language.

**public string weekday()**

return a day of the week as farsi language.
