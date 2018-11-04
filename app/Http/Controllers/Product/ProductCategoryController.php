<?php

namespace App\Http\Controllers\Product;

use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
   
    /// Product Category View ////
    public function index(){
		$base = Category::select('name')->get();
        return view('product.category')->with('base',$base);
    }

    /// Product Category Insert ////
    public function createCategory(Request $request){
        $this->validate($request,[
                'category'=>'required|min:3|max:25',
                 ],[
                 'category.required'=>'Category will be in 3-25 Letters',
                 'category.min'=>'Category will be in 3-25 Letters',
                 'category.max'=>'Category will be in 3-25 Letters',
                ]);
				
		Category::create([
			'name'=>$request->category,
			'slug'=>str_slug($request->category, '-'),
		]);
		
		
        return back()->with('success','Product Category '.$request->category.' Insert Successfully');
    }
	
	
	
	
}
