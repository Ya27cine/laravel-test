<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

//  {}
Route::get('/', function () {
    return view('welcome');
})->name("index");
Route::get('/home', function () {
    return view('home');
})->name("home");

Route::patch("/posts/{id}/restore", [PostController::class, 'restore'])->name("posts.restore");
Route::get("/posts/archive", [PostController::class, 'archive']);
Route::get("/posts/all", [PostController::class, 'all']);

Route::resource("/posts", PostController::class);





Route::resource("/category", CategoryController::class)->except(['index', 'show']);
Route::resource("/autor", AuthorController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
