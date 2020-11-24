<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

Route::get('/', function () { return view('welcome');})->name('welcome');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addmember',[App\Http\Controllers\MemberControler::class,'create'])->name('create');
Route::post('/addmember',[App\Http\Controllers\MemberControler::class,'store'])->name('store');
Route::get('/memberlist',[App\Http\Controllers\MemberControler::class,'index'])->name('memberlist');
Route::get('/point',[App\Http\Controllers\PoinController::class,'index'])->name('point_list');
Route::get('/point',[App\Http\Controllers\PoinController::class,'create'])->name('point_create');
Route::get('/point/{user_id}',[App\Http\Controllers\PoinController::class,'edit'])->name('point_edit');
Route::post('/point',[App\Http\Controllers\PoinController::class,'store'])->name('point_store');








Auth::routes();
