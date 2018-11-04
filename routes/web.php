<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////Route::get('/', function () {
////    return view('welcome');
////});

Route::get('/', 'WebpageController@index');
Route::get('/contact', 'ContactUsController@contact')->name('contact');
Route::get('/product/{slug}', 'productViewController@categoryView');
Route::post('/contact', 'ContactUsController@contactEmail');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'{user}','middleware'=>['auth','verified']],function(){
	Route::get('settings/profile', 'ProfileController@index');
});

###### For Admin Route ########################
Route::group(['prefix'=>'admin','middleware'=>['auth','verified','admin']],function(){
	//// Dashboard ////
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
	//// Product Actions ////
	Route::get('product/category', 'Product\ProductCategoryController@index');
	Route::post('product/category', 'Product\ProductCategoryController@createCategory');
	//-- sub-category --//
	Route::get('product/sub-category', 'Product\ProductSubCategoryController@index');
	Route::post('product/sub-category', 'Product\ProductSubCategoryController@createSubCategory');
	//-- add Product --//
	Route::get('product/product-add', 'Product\ProductController@index');
	Route::post('product/product-add', 'Product\ProductController@createProduct');
	//-- Product Edit/Delete --//
	Route::get('product/product-edit', 'Product\ProductController@productEdit');
	Route::post('product/product-edit', 'Product\ProductController@productUpdate');
	Route::post('product/delete', 'Product\ProductController@productDelete');

});










