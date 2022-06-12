<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// standard URL /resources/action/id (/sub-resource/sub-id) derived from REST

Route::get("/articles", [ ArticleController::class, 'index']);

Route::get("/articles/detail/{id}", [ ArticleController::class, 'detail']);

Route::get("/articles/delete/{id}", [ ArticleController::class, 'delete']);

Route::get("/articles/add", [ ArticleController::class, 'add']);
Route::post("/articles/add", [ ArticleController::class, 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');