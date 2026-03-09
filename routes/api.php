<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;

use App\Http\Controllers\BookApiController;
use App\Http\Controllers\BookRestController;
use App\Http\Controllers\BookRpcController;
use App\Http\Controllers\BookSacController;

use App\Http\Controllers\TimeApiController;
use App\Http\Controllers\TimeRpcController;

use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;

Route::apiResource('posts', PostController::class);

Route::prefix('books')->group(function () {
    Route::prefix('rpc')->group(function () {
        Route::post('{id}/borrow', [BookRpcController::class, 'borrowBook']);
        Route::post('{id}/return', [BookRpcController::class, 'returnBook']);
    });

    Route::get('sac/{id}', BookSacController::class);

    Route::prefix('rest')->group(function () {
        Route::get('/', [BookRestController::class, 'index']);
        Route::get('create', [BookRestController::class, 'create']);
        Route::post('/', [BookRestController::class, 'store']);
        Route::get('{id}', [BookRestController::class, 'show']);
        Route::get('{id}/edit', [BookRestController::class, 'edit']);
        Route::patch('{id}', [BookRestController::class, 'update']);
        Route::delete('{id}', [BookRestController::class, 'destroy']);
    });

    Route::prefix('api')->group(function () {
        Route::get('/', [BookApiController::class, 'index']);
        Route::post('/', [BookApiController::class, 'store']);
        Route::get('{id}', [BookApiController::class, 'show']);
        Route::patch('{id}', [BookApiController::class, 'update']);
        Route::delete('{id}', [BookApiController::class, 'destroy']);
    });
});

Route::prefix('time')->group(function () {
    Route::get('/getTime', [TimeApiController::class, 'getTime']);
    Route::get('/showTime', [TimeRpcController::class, 'showTime']);
});

Route::prefix('notes')->group(function () {
    Route::apiResource('notes', NoteController::class);
    Route::apiResource('categories', CategoryController::class);

    Route::get('/notes/pinned', [NoteController::class, 'pinnedNotes']);
});
