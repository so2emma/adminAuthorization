<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::prefix("admin")->name("admin.")->group(function() {
    Route::middleware(["guest:admin"])->group( function()
    {
        Route::view("/login", "admin.login")->name("login");
        Route::post("/check", [AdminController::class, "check"])->name("check");
    });
    Route::middleware(["auth:admin"])->group(function() {
        Route::get("/index",[AdminController::class, "index"]);
    });
});
