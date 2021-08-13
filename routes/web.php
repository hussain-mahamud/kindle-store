<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Publisher\PublisherController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Slider\SliderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin
Route::group(['prefix'=>'admin','middleware'=>['admin','auth','PreventBackHistory']],function(){
	Route::get('dashboard',[AdminController::Class,'index'])->name('admin.dashboard');
	Route::get('profile',[AdminController::Class,'profile'])->name('admin.profile');
	//Book pdf view
	
	//Resource
	Route::resource('books',BookController::Class);
	Route::resource('categories',CategoryController::Class);
	Route::resource('sliders',SliderController::Class);
});







//User
Route::group(['prefix'=>'user','middleware'=>['user','auth','PreventBackHistory']],function(){
	Route::get('dashboard',[UserController::Class,'index'])->name('user.dashboard');
	Route::get('profile',[UserController::Class,'profile'])->name('user.profile');
});

//Publisher
Route::group(['prefix'=>'publisher','middleware'=>['publisher','auth','PreventBackHistory']],function(){
	Route::get('dashboard',[PublisherController::Class,'index'])->name('publisher.dashboard');
	Route::get('profile',[PublisherController::Class,'profile'])->name('publisher.profile');
});
