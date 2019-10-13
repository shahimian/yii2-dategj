<?php

use shahimian\dategj\DateGJ;

class DateGjTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _before(){
        $this->varBirthday = '2019-10-08 20:21';
        $this->var2 = '2019-09-08 11:51';
        $this->tester = \Yii::createObject([
            'class' => DateGJ::className(),
            'datetime' => $this->var2,
        ]);

    }
    
    public function testDateGregorianToJalaliProperty(){
        $this->assertEquals($this->var2, $this->tester->datetime);
    }

    public function testDateGregorianToJalaliConvert(){
        $this->assertEquals('1398-6-17 11:51', $this->tester->gj());
    }

    public function testDateSetMyBirthday(){
        $this->tester->datetime = $this->varBirthday;
        $this->assertEquals($this->varBirthday, $this->tester->datetime);
        $this->assertEquals('1398-7-16 20:21', $this->tester->gj());
    }

    public function testDateSegmentFunction(){
        $this->tester->datetime = $this->varBirthday;
        $this->assertEquals([1398, 7, 16], $this->tester->dateSegment());
    }

    public function testYearMonthDayFunction(){
        $this->tester->datetime = $this->varBirthday;
        $this->assertEquals('1398', $this->tester->year());
        $this->assertEquals('7', $this->tester->month());
        $this->assertEquals('16', $this->tester->day());
    }

    public function testDateJalaliToGregorianConvert(){
        $this->tester->datetime = "1398-7-16 11:51";
        $this->assertEquals('2019-10-8 11:51', $this->tester->jg());
    }

}
?>
