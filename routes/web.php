<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExampleController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\ThankyouController;
use App\Http\Controllers\ProductController;

Route::prefix("profile")->group(function () {
    Route::get("/create", [ProfileController::class, "showForm"]);
    Route::post("/result", [ProfileController::class, "processForm"]);
});

Route::prefix("example")->group(function () {
    Route::get("/create", [ExampleController::class, "showForm"]);
    Route::post("/result", [ExampleController::class, "processForm"]);
});

// Basic controller
Route::get("/", [PageController::class, "home"]);
Route::get("/about", [PageController::class, "about"]);
Route::get("/contact", [PageController::class, "contact"]);

// Single action controller
Route::get("thankyou", ThankyouController::class);

// Resource controller
Route::resource("products", ProductController::class);
