<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('site.home');
});

Route::get('/about', function () {
    return view('site.about');
});

Route::get('/contact', function () {
    return view('site.contact');
});

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name'    => ['required', 'min:2'],
        'email'   => ['required', 'email'],
        'message' => ['required', 'min:5'],
    ]);

    return view('site.thanks', $data);
});
