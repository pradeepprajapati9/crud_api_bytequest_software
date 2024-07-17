<?php

use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userdatacontroller;
use Illuminate\Support\Facades\Route;

// user data
Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::post('savedata',[userdatacontroller::class,"store"])->name("savedata");
Route::post('logincheck',[userdatacontroller::class,"checkUser"])->name("logincheck");
Route::get('dashboard',[userdatacontroller::class,"dashboardpage"])->name("dashboard");
Route::get('logoute',[userdatacontroller::class,"logoutUser"])->name("logoute");

// shopping api with crude functionalty
Route::get('get-product',function(){
    return view('assigmentApi.index');
});
Route::get('add-product',function(){
    return view('assigmentApi.shopping');
});

Route::get('all-product',[ShoppingController::class,"GetAllProduct"])->name("all-product");
Route::post('store-product',[ShoppingController::class,"Storeproduct"])->name("store-product");
Route::get('editproduct/{id}',[ShoppingController::class,"edit"])->name('editproduct');
Route::post("update-product",[ShoppingController::class,"updataProduct"])->name('update-product');
Route::get("delete-product/{id}",[ShoppingController::class,"DeleteProduct"])->name('delete-product');