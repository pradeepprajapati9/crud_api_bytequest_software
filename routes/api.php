<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;


Route::get('/getallproduct',[ShoppingController::class,"GetAllProduct"]);
Route::post("/saveproduct",[ShoppingController::class,"Storeproduct"])->name("saveproduct");
// set Route for delete
// browser =get
// postman=delete
Route::delete("/delete/{id}",[ShoppingController::class,"DeleteProduct"]);
Route::patch("update/{id}",[ShoppingController::class,"update"]);



 