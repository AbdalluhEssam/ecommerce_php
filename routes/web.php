<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/client/login",[ClientController::class,"login"]);

Route::get("/client/register",[ClientController::class ,"register"]);

// Route::get("products",[ProductController::class ,"index"]);
// Route::get("products/create",[ProductController::class ,"create"]);
// Route::post("products",[ProductController::class ,"store"]);
// Route::get("products/{id}",[ProductController::class ,"show"]);
// Route::get("products/{id}/edit",[ProductController::class ,"edit"]);
// Route::put("products/{id}",[ProductController::class ,"update"]);
// Route::delete("products/{id}",[ProductController::class ,"destroy"]);


Route::resource("products",ProductController::class);