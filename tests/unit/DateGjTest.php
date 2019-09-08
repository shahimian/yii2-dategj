<?php

use shahimian\dategj\DateGJ;

class DateGjTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    public function testDateGeogorialToJalaliProperty()
    {
        $dt = \Yii::createObject([
            'class' => DateGJ::className(),
            'datetime' => '2019-08-09 11:51',
        ]);
        $this->assertEquals('1398-06-17 11:51', $dt->gj());
    }
}
?>
