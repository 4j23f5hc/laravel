<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Product;
use Illuminate\Http\Request;

class productViewController extends Controller
{
    //category wise view /////
    public function categoryView($slug){
         $categoryCheck = Category::where('slug',$slug)->first();
         if ($categoryCheck != null ) {
         	########## SubCategory Shorting ########
         	$subcateg = SubCategory::where('category_id',$categoryCheck->id)->get();
          ########## Product Shorting ########
         	$product = Product::where('category_id',$categoryCheck->id)->get();

         	return view('frontEnd.product',['subcateg'=>$subcateg,'product'=>$product]);
         }
         return redirect ('/');
    }

}
