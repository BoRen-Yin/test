<?php

use Illuminate\Support\Facades\Route;

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

Route::get('info',function (){
   return phpinfo();
});

//Route::get('/admin','Admin\IndexController@index');
Route::redirect('/admin', '/admin/index');
Route::any('/admin/login',[\App\Http\Controllers\Admin\IndexController::class,'login']);


Route::group(['prefix'=>'admin','middleware'=>'AdminIsLogin'],function (){
    Route::get('index',[\App\Http\Controllers\Admin\IndexController::class,'index']);
    Route::get('main',[\App\Http\Controllers\Admin\IndexController::class,'main']);
    Route::get('logout',[\App\Http\Controllers\Admin\IndexController::class,'logout']);
    Route::get('cache_flush',[\App\Http\Controllers\Admin\IndexController::class,'cache_flush']);
    Route::any('admin/savepasswd',[\App\Http\Controllers\Admin\AdminController::class,'savepasswd']);
    Route::get('admin/ckpwd',[\App\Http\Controllers\Admin\AdminController::class,'ckpwd']);
    Route::get('admin/edit',[\App\Http\Controllers\Admin\AdminController::class,'edit']);
});
