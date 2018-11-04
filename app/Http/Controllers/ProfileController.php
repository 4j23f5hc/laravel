<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /// Profile View ///
	public function index(){
		return view('profile');
	}
}
