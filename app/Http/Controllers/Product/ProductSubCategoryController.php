<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSubCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /// Product Sub Category View ////
    public function index(){
		$base= Category::select('id','name','slug')->get();
        return view('product.subCategory')->with('base',$base);
    }

    /// Product Sub Category Insert ////
    public function createSubCategory(Request $request){
		
        $this->validate($request,[
                'base'=>'required|exists:categories,id',
                'sub_category'=>'required|min:3|max:50',
                 ],[
                 'base.required'=>'You need to select Base Category first.',
                 'base.exists'=>'Base Category id is Invalid',
                 'sub_category.required'=>'Sub Category will be in 3-25 Letters',
                 'sub_category.min'=>'Sub Category will be in 3-25 Letters',
                 'sub_category.max'=>'Sub Category will be in 3-25 Letters',
                ]);
				
		SubCategory::create([
			'name'=>title_case($request->sub_category),
			'slug'=>str_slug($request->sub_category, '-'),
			'category_id'=>$request->base,
		]);
		
		
        return back()->with('success','Product Sub-Category '.$request->sub_category.' Insert Successfully');
    }
	
	
	
	
}
