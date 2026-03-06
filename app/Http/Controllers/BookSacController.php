<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookSacController extends Controller {
    public function __invoke(Request $request, int $id) {
        $format = $request->input("format");
        return response("book with ID = $id in format: $format.");
    }
}
