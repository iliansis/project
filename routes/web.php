<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PocoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ZakazController;

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



Route::get('/items/{id}',[PocoController::class,'details'])->name('item');
Route::get('/',[WelcomeController::class,'welcome'])->name('home');

Route::get('/cat/{id}',[WelcomeController::class,'welcome']);


Route::middleware('guest')->group(function(){
Route::post('/register',[RegisterController::class,'register'])->name('register');
Route::post('/auth',[loginController::class,'login'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::get('/zakaz',[CartController::class,'zakaz'])->name('zakaz');
    Route::post('/addZakaz',[CartController::class,'addZakaz'])->name('addZakaz');
    Route::get('/zakaz/sendEmail',[CartController::class,'sendEmail'])->name('email');
    
    Route::get('/cart',[CartController::class,'cart'])->name('cart');
    Route::get('/logout',[loginController::class,'logout'])->name('logout');
    Route::post('/items/{id}/addReviews',[PocoController::class,'addReviews'])->name('addReviews');
    Route::post('/addCart',[CartController::class,'addCart'])->name('addCart');
    Route::post('/countItem',[CartController::class,'countItem'])->name('countItem');
    Route::post('/sumCart',[CartController::class,'sumCart'])->name('sumCart');
    Route::post('/name',[CartController::class,'name'])->name('name');
    Route::get('/deleteItemCart/{id}',[CartController::class,'deleteItem'])->name('deleteItem');
    });