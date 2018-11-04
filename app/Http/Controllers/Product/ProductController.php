<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\SubCategory;
use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Product Form View //
	public function index(){
		$base = Category::get();
		return view('product.productAdd')->with('base',$base);
	}
	
    // Product Add //
	public function createProduct(Request $request){
		$this->validate($request,[
			'productCategory'=>'required|exists:sub_categories,id',
			'name'=>'required|string|min:5|max:100',
			'price'=>'required|numeric',
			'description'=>'required|string|min:10|max:1000',
			'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
		]);
		/// getting category id ///
		$base =SubCategory::where('id',$request->productCategory)->first();
		//$image = $_FILES['image'];
		$image = $request->file('image');
		$imageName=Str::uuid().'.'.$image->getClientOriginalExtension();
		
		/// image storing path ///
		$tagretedPath= 'product';
		$destination = public_path($tagretedPath);
		/// image move to save ///
		$imgInsert= $image->move($destination, $imageName);
		
		$imagePath = $tagretedPath.'/'.$imageName;
		
		/// After Inserting Image Database work ///
		if($imgInsert){
			Product::create([
			'name'=>title_case($request->name),
			'slug'=>str_slug($request->name),
			'price'=>$request->price,
			'description'=>$request->description,
			'image'=>$imagePath,
			'category_id'=>$base->category_id,
			'subcateg_id'=>$request->productCategory,
			]);
			
			return back()->with('success','Product '.title_case($request->name).' Insert Successfully');
		}else{
			return 'something wrong';
		}
		
		
	}
	
	// Product Edit View //
	public function productEdit(){
		$product = Product::get();
		return view('product.productEdit')->with('product',$product);
	}
	
	// Product Update.. //
	public function productUpdate(Request $request){
		$this->validate($request,[
			'id'=>'required|exists:products,id',
			'name'=>'required|string|min:5|max:100',
			'price'=>'required|numeric',
			'description'=>'required|string|min:10|max:1000',
		]);
		
		// Image Validation //
		$image = $request->file('image');
		if(!empty($image)){
			$imageValidation= ['jpg','jpeg','png','gif'];
			if(!in_array($image->getClientOriginalExtension(), $imageValidation) && $image->getsize() > 1024 ){
				return back()->with('p_error', 'Image will be jpg,jpeg,png or gif format');
				
			}
		}
		
		$productEdit = Product::findOrFail($request->id);
		
		if(!empty($image)){
			$imageName=Str::uuid().'.'.$image->getClientOriginalExtension();
			/// previous image delete
			unlink(public_path($productEdit->image));
			
			/// image storing path ///
			$tagretedPath= 'product';
			$destination = public_path($tagretedPath);
			/// image move to save ///
			$imgInsert= $image->move($destination, $imageName);
			
			$imagePath = $tagretedPath.'/'.$imageName;
			
		}else{
			$imagePath = $productEdit->image;
		}
		
		$productEdit->name = title_case($request->name);
		$productEdit->slug = str_slug($request->name);
		$productEdit->price = $request->price;
		$productEdit->image = $imagePath;
		$productEdit->description = $request->description;
		$productEdit->save();
		
		return back()->with('success','Product '.title_case($request->name).' Update Successfully');

	}
	
	###### Product Delete #######
	public function productDelete(Request $request){
		$pDelete= Product::findOrFail($request->id);
		
		/// Image Delete From Directory ///
		unlink(public_path($pDelete->image));
		
		$pDelete->delete();
		
		return back()->with('success','Product Delete Successfully');

	}
	
	
	
	
	
	
	
	
}




