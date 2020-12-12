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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Store', 'prefix' => 'store'], function() {
	Route::resource('products', 'ProductController')->names('store.products');
	Route::resource('categories', 'ProductCategoryController')->names('store.categories');
});


// Admin
$groupData = [
	'namespace' => 'Store\Admin',
	'prefix'	=> 'admin/store',
];
Route::group($groupData, function(){
	//ProductCategoty
	$methods = ['index', 'edit', 'update', 'create', 'store', 'destroy'];
	Route::resource('categories', 'ProductCategoryController')
		->only($methods)
		->names('store.admin.categories')->middleware('auth');

	//Products
	Route::resource('products', 'ProductController')
		->only($methods)
		->names('store.admin.products')->middleware('auth');
});
