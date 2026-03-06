<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookRpcController extends Controller {
    public function borrowBook(Request $request, int $id) {
        $userId = $request->input("user_id");

        return response(
            "client {$userId} borrowed book with ID {$id}."
        );
    }

    public function returnBook(Request $request, int $id) {
        $userId = $request->input("user_id");
        $condition = $request->input("condition");

        return response(
            "client {$userId} returned book with ID {$id} in condition: {$condition}."
        );
    }
}
