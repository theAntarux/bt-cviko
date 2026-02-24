<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExampleController;

Route::prefix("profile")->group(function () {
    Route::get("/create", [ProfileController::class, "showForm"]);
    Route::post("/result", [ProfileController::class, "processForm"]);
});

Route::prefix("example")->group(function () {
    Route::get("/create", [ExampleController::class, "showForm"]);
    Route::post("/result", [ExampleController::class, "processForm"]);
});

