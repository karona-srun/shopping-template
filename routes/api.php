<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductSubCategoryControlle;
use App\Http\Controllers\ProductCategoryControlle;
use App\Http\Controllers\ProductControlle;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\FrontEnd_HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-datas','FrontEnd_HomeController@home');
Route::get('get-data/{id}','FrontEnd_HomeController@fetchData');
Route::get('get-products-by-category/{id}','FrontEnd_HomeController@fetchProductByCategory');
Route::get('get-products-by-sub-category/{id}','FrontEnd_HomeController@fetchProductbySubCategory');

Route::resource('product-category','ProductCategoryController');
Route::get('get-list-category','ProductCategoryController@getListCategory');
Route::resource('product-sub-category', 'ProductSubCategoryController');
Route::get('get-list-sub-category', 'ProductSubCategoryController@getListSubCategory');
Route::resource('product','ProductController');
Route::post('update-product','ProductController@updateProduct');
Route::resource('attachments','AttachmentController');
Route::post('get-attachments','AttachmentController@getListAttachment');
