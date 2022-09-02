<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
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

        // message routes
        Route::prefix("message")->name("message.")->group(function() {
            Route::view("/create", "user.message.create")->name("create");
            Route::post("/store", [UserController::class, "message_store"])->name("store");
            Route::get("/index", [UserController::class, "message_index"])->name("index");
        });

        /**
         * Tasks Route
         */
        Route::resource("task", TaskController::class);

    });
});

// ADMIN FUNCTIONALITIES

Route::prefix("admin")->name("admin.")->group(function() {
    Route::middleware(["guest:admin", 'PreventBackHistory'])->group( function()
    {
        Route::view("/login", "admin.login")->name("login");
        Route::post("/check", [AdminController::class, "check"])->name("check");
    });
    Route::middleware(["auth:admin", 'PreventBackHistory'])->group(function() {
        Route::get("/dashboard/", [AdminController::class, "dashboard"])->name("dashboard");
        Route::get("/index",[AdminController::class, "index"])->name("index");
        Route::post("/logout", [AdminController::class, "logout"])->name("logout");
        Route::post("/status/{user}", [AdminController::class, "status"])->name("status");

        // message routes
        Route::get("/message/index", [AdminController::class, "message_index"])->name("message.index");

        /**
         * CATEGORY ROUTES
         **/
        Route::resource('category', CategoryController::class);

        /**
         * Admin Task Routes
         */
        Route::resource("task", AdminTaskController::class);


    });
});
