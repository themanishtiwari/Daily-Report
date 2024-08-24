<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\CarbonPeriod;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{
    function test(){
        $total_work_hour = DailyReport::where('user_id', 1)->whereDate('date', '>=', '2024-01-01')->whereDate('date', '<=', '2024-08-15')->sum('work_hour');
        
        
        // Convert the period to an array of dates
        // $dates = $period->toArray();
        return $total_work_hour;
    }
}
