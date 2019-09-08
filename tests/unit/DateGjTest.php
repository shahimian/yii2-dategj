<?php

use shahimian\dategj\DateGJ;

class DateGjTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _before(){
        $this->tester = \Yii::createObject([
            'class' => DateGJ::className(),
            'datetime' => '2019-09-08 11:51',
        ]);
    }
    
    public function testDateGregorianToJalaliProperty(){
        $this->assertEquals('2019-09-08 11:51', $this->tester->datetime);
    }

    public function testDateGregorianToJalaliConvert(){
        $this->assertEquals('1398-06-17 11:51', $this->tester->gj());
    }

    public function testDateSetMyBirthday(){
        $this->tester->datetime = "2019-10-08 20:21";
        $this->assertEquals('2019-10-08 20:21', $this->tester->datetime);
        $this->assertEquals('1398-07-16 20:21', $this->tester->gj());
    }

}
?>
