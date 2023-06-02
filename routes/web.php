<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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



