<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Controller Menuju ke halaman admin

class AdminController extends Controller
{
    function index(){
        return view('dashboard');
    }

    function admin(){
        return view('layouts.admin');
    }
}
