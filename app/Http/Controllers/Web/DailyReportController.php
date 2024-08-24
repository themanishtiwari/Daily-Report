<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    function index(){
        return view('web.index');
    }

    function loginForm(){
        return view('auth.login');
    }

    function registerForm(){
        return view('auth.register');
    }
}
