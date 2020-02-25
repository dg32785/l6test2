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
    //UserAccess::getAccess();
    return view('login');
});
Route::get('register', function (){
    return view('register');
});

Route::post('login','UserController@login');
Route::Post('register','UserController@register');
Route::get('logout','UserController@logout');

Route::group(['middleware'=>['LoginCheck']],function(){
    Route::get('dashboard',function (){
        return view('dashboard');
    });
    Route::get('products','ProductController@index');
    /*Route::get('addproduct',function(){
        return view('addproduct');
    });*/
    Route::get('product/add', 'ProductController@addproduct_view')->name('addproduct_view');
    Route::get('product/edit/{id}', 'ProductController@editproduct_view')->name('editproduct_view');
    Route::post('product/delete', 'ProductController@deleteproduct')->name('deleteproduct');
    Route::post('addproduct','ProductController@addproduct');
    Route::post('editproduct','ProductController@editproduct');

    Route::get('items','ItemController@index');
    Route::get('item/add', 'ItemController@additem_view')->name('additem_view');
    Route::get('item/edit/{id}', 'ItemController@edititem_view')->name('edititem_view');
    Route::post('item/delete', 'ItemController@deleteitem')->name('deleteitem');
    Route::post('additem','ItemController@additem');
    Route::post('edititem','ItemController@edititem');
    Route::post('item/productadd', 'ItemController@productadd')->name('productadd');


});
