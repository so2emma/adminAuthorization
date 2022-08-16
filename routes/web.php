<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
    return view('user.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("admin")->name("admin.")->group(function() {
    Route::middleware(["guest:admin", 'PreventBackHistory'])->group( function()
    {
        Route::view("/login", "admin.login")->name("login");
        Route::post("/check", [AdminController::class, "check"])->name("check");
    });
    Route::middleware(["auth:admin", 'PreventBackHistory'])->group(function() {
        Route::get("/index",[AdminController::class, "index"])->name("index");
        Route::post("/logout", [AdminController::class, "logout"])->name("logout");

    });
});

Route::prefix("user")->name("user.")->group(function() {
    Route::middleware(["guest:web", 'PreventBackHistory'])->group(function() {
        Route::view("/login", "user.login")->name("login");
        Route::view("/register", "user.register")->name("register");
        Route::post("/create", [UserController::class, "create"])->name("create");
        Route::post("/check", [UserController::class, "check"])->name("check");
    });
    Route::middleware(["auth:web", 'PreventBackHistory'])->group(function() {
        Route::get("/home", [UserController::class, "home"])->name("home");
        Route::post("/logout", [UserController::class, "logout"])->name("logout");
    });
});
