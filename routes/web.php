<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\StorehouseController;
use App\Http\Controllers\ProductfolderController;
use App\Http\Controllers\CustomerorderController;
use App\Http\Controllers\DemandController;
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

Route::get("/home", [HomeController::class, "getHomePage"]);

Route::get("/posts/{id}", [PostController::class, "getById"])->where('id', '[0-9]+');;

Route::get("/posts/published", [PostController::class, "getAllPublished"]);

Route::get("/posts", [PostController::class, "getAll"]);

Route::group(["prefix" => "product"], function () {
    Route::post("/add", [ProductController::class, "add"]);
    Route::put("/edit/{id}", [ProductController::class, "edit"]);

});

Route::group(["prefix" => "service"], function () {
    Route::post("/add", [ServiceController::class, "add"]);
    Route::put("/edit/{id}", [ServiceController::class, "edit"]);

});

Route::group(["prefix" => "counterparty"], function () {
    Route::post("/add", [CounterpartyController::class, "add"]);
    Route::put("/edit/{id}", [CounterpartyController::class, "edit"]);

});

Route::group(["prefix" => "storehouse"], function () {
    Route::post("/add", [StorehouseController::class, "add"]);
    Route::put("/edit/{id}", [StorehouseController::class, "edit"]);

});

Route::group(["prefix" => "productfolder"], function () {
    Route::post("/add", [ProductfolderController::class, "add"]);
    Route::put("/edit/{id}", [ProductfolderController::class, "edit"]);

});

Route::group(["prefix" => "customerorder"], function () {
    Route::post("/add", [CustomerorderController::class, "add"]);
    Route::put("/edit/{id}", [CustomerorderController::class, "edit"]);

});

Route::group(["prefix" => "demand"], function () {
    Route::post("/add", [DemandController::class, "add"]);
    Route::put("/edit/{id}", [DemandController::class, "edit"]);

});




