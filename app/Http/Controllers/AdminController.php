<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard View //
    public function index(){
    	return view('adminDashboard');
    }
}
