<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CarbonController extends Controller
{
    //
    public function index(){
        echo 'Iran Date : ' . Carbon::now( 'Asia/Tehran') . '<br><br>';

        echo 'Iran Date Format Y-m-d : ' . Carbon::now( 'Asia/Tehran')->format('Y-m-d') . '<br><br>';

        echo 'Iran Date Format H:i:s : ' . Carbon::now( 'Asia/Tehran')->format('H:i:s') . '<br><br>';

        $user = User::query()->where('name' ,'John Doe')->first();
        $jalaliDate = Carbon::parse($user['created_at']);
        $yearInMiladi = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->year);
        $monthInMiladi = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->month);
        $dayInMiladi = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->day);
        $dateInMiladi = "{$yearInMiladi}/{$monthInMiladi}/{$dayInMiladi}";
        echo 'تاریخ ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $dateInMiladi  .'<br><br>';


        $first = Carbon::create(2021, 9, 5, 23, 26, 11);
        $second = Carbon::create(2021, 9, 5, 20, 26, 11, 'America/Vancouver');
        echo ($first->equalTo($second) ? 'yes' : 'no') .'<br><br>';
        echo ($first->greaterThan($second) ? 'yes' : 'no') .'<br><br>';
        echo ($first->lessThan($second) ? 'yes' : 'no') .'<br><br>';

        $dt = Carbon::now();
// set some things
        $dt->year   = 2015;
        $dt->month  = 04;
        $dt->day    = 21;
        $dt->hour   = 22;
        $dt->minute = 32;
        $dt->second = 5;
        echo $dt->year .'<br><br>';
        $bt = Carbon::now();
         $time =$bt->year(1975)->month(5)->day(21)->hour(22)->minute(32)->second(5)->toDateTimeString();
        echo $time .'<br><br>';




        $mt     = Carbon::now();
        $past   = $mt->subMonths(3);
        $future = $mt->addMonths(4);
        echo $mt->subDays(20)->diffForHumans().'<br><br>';     // 10 days ago
        echo $mt->diffForHumans($past).'<br><br>';            // 1 month ago
        echo $mt->diffForHumans($future).'<br><br>';
        $current = Carbon::now();
        $tt = $user['created_at'];
        $tt = $tt->subHours(6);
        echo $tt->copy()->diffInHours($current).'<br><br>';        // -6
        echo $current->diffInHours($tt).'<br><br>';         // 6
        $future = $current->copy()->addMonths(2);
        $past   = $current->copy()->subMonths(1);
        echo ' expire time :  '. $current->diffInDays($future).'<br><br>';      // 31
        echo  ' difference in past '.$current->diffInDays($past).'<br><br>';
    }
}

//$first = Carbon::create(2021, 9, 5, 23, 26, 11);
//$second = Carbon::create(2021, 9, 5, 20, 26, 11, 'America/Vancouver');
//var_dump($first->equalTo($second));                // bool(false)
//var_dump($first->notEqualTo($second));             // bool(true)
//var_dump($first->greaterThan($second));            // bool(false)
//var_dump($first->greaterThanOrEqualTo($second));   // bool(false)
//var_dump($first->lessThan($second));               // bool(true)
//var_dump($first->lessThanOrEqualTo($second));      // bool(true)


//$dt = Carbon::now();
//// set some things
//$dt->year   = 2015;
//$dt->month  = 04;
//$dt->day    = 21;
//$dt->hour   = 22;
//$dt->minute = 32;
//$dt->second = 5;
//// get some things
//var_dump($dt->year);
//var_dump($dt->month);
//var_dump($dt->day);
//var_dump($dt->hour);
//var_dump($dt->second);
//var_dump($dt->dayOfWeek);
//var_dump($dt->dayOfYear);
//var_dump($dt->weekOfMonth);
//var_dump($dt->daysInMonth);


//$dt = Carbon::now();
//$dt->year(1975)->month(5)->day(21)->hour(22)->minute(32)->second(5)->toDateTimeString();
//$dt->setDate(1975, 5, 21)->setTime(22, 32, 5)->toDateTimeString();
//$dt->setDateTime(1975, 5, 21, 22, 32, 5)->toDateTimeString();


//$dt     = Carbon::now();
//$past   = $dt->subMonth();
//$future = $dt->addMonth();
//echo $dt->subDays(10)->diffForHumans();     // 10 days ago
//echo $dt->diffForHumans($past);             // 1 month ago
//echo $dt->diffForHumans($future);


//$current = Carbon::now();
//$dt      = Carbon::now();
//$dt = $dt->subHours(6);
//echo $dt->diffInHours($current);         // -6
//echo $current->diffInHours($dt);         // 6
//$future = $current->addMonth();
//$past   = $current->subMonths(2);
//echo $current>copy()->diffInDays($future);      // 31
//echo $current>copy()->diffInDays($past);
