<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
    //middleware via controller
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'home']);
        $this->middleware('auth')->except(['index', 'home']);
    } */
    public function index()
    {
        return view('admin.dashboard');
    }
}
