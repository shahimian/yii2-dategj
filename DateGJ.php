<?php

namespace app\widgets\dategj;

class DateGJ
{
	public static function gj($datetime) 
	{
		$datetime_arr=explode(' ',$datetime);
		$date_arr=explode('-',$datetime_arr[0]);
		list($jy, $jm, $jd) = DateGJ::convertor($datetime);
		$datetime="$jy-$jm-$jd ";
		if(isset($datetime_arr[1]))
		{
			$datetime .= $datetime_arr[1];
		}
		
		return $datetime;
	}

	public static function convertor($datetime) {
		$datetime_arr=explode(' ',$datetime);
		$date_arr=explode('-',$datetime_arr[0]);
		
		$g_y=$date_arr[0];
		$g_m=$date_arr[1];
		$g_d=$date_arr[2];
		
		$g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
		$j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);     

		$gy = $g_y-1600; 
		$gm = $g_m-1; 
		$gd = $g_d-1; 

		$g_day_no = 365*$gy+(int)(($gy+3)/4)-(int)(($gy+99)/100)+(int)(($gy+399)/400); 

		for ($i=0; $i < $gm; ++$i) 
			$g_day_no += $g_days_in_month[$i]; 
			
		if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
			/* leap and after Feb */ 
			$g_day_no++; 
		$g_day_no += $gd; 

		$j_day_no = $g_day_no-79; 

		$j_np = (int)($j_day_no/12053); /* 12053 = 365*33 + 32/4 */ 
		$j_day_no = $j_day_no % 12053; 

		$jy = 979+33*$j_np+4*(int)($j_day_no/1461); /* 1461 = 365*4 + 4/4 */ 

		$j_day_no %= 1461; 

		if ($j_day_no >= 366)
		{ 
			$jy += (int)(($j_day_no-1)/365); 
			$j_day_no = ($j_day_no-1)%365; 
		} 

		for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
			$j_day_no -= $j_days_in_month[$i]; 
		$jm = $i+1; 
		$jd = $j_day_no+1;
		return [ $jy, $jm , $jd ];
	}

	public static function month($datetime){
		$datetime = explode(" ", DateGJ::gj(date("Y-m-d H:i:s", $datetime)));
		$date = count($datetime) ? explode("-", $datetime[0]) : null;
		return count($date) ? $date[1] : null;
	}

	public static function month_name($month){
		switch($month){
			case 1: $str = 'فروردین'; break;
			case 2: $str = 'اردیبهشت'; break;
			case 3: $str = 'خرداد'; break;
			case 4: $str = 'تیر'; break;
			case 5: $str = 'مرداد'; break;
			case 6: $str = 'شهریور'; break;
			case 7: $str = 'مهر'; break;
			case 8: $str = 'آبان'; break;
			case 9: $str = 'آذر'; break;
			case 10: $str = 'دی'; break;
			case 11: $str = 'بهمن'; break;
			case 12: $str = 'اسفند'; break;
			default: $str = false;
		}
		return $str;
	}

	public static function full_date($datetime){
		list($jy, $jm, $jd) = DateGJ::convertor($datetime);
		return DateGJ::weekday($datetime) . " $jd " . DateGJ::month_name($jm) . " $jy";
	}

	public static function weekday($datetime){
		$w = date('w', strtotime($datetime));
		switch($w){
			case 0: $d = 'یکشنبه'; break;
			case 1: $d = 'دوشنبه'; break;
			case 2: $d = 'سه شنبه'; break;
			case 3: $d = 'چهارشنبه'; break;
			case 4: $d = 'پنجشنبه'; break;
			case 5: $d = 'جمعه'; break;
			case 6: $d = 'شنبه'; break;
		}
		return $d;
	}

}
?>
