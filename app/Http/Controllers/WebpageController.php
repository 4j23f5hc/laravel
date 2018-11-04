<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    // home view ///
	public function index(){
		$category= Category::select('id','name','slug')->get();
		$product = Product::get();
		
		return view('frontEnd.home',[ 'category'=> $category , 'product'=>$product]);
	}
    
}
