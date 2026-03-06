<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookRestController extends Controller {
    private $books = [
        ["id" => 1, "title" => "Book 1", "author" => "John Doe"],
        ["id" => 2, "title" => "Book 2", "author" => "Sam Doe"],
        ["id" => 3, "title" => "Book 3", "author" => "Donald Doe"],
    ];

    public function index() {
        return response()->json([
            "books" => $this->books,
        ], Response::HTTP_OK);
    }

    public function create() {
        echo "form for creating a book";
    }

    public function store(Request $request) {
        $title = $request->input("title");
        $author = $request->input("author");

        return response("book $title was created");
    }
    
    public function show(string $id) {
        return response("displaying book with ID $id.");
    }

    public function edit(string $id) {
        echo "form for editing book with ID = $id.";
    }

    public function update(Request $request, string $id) {
        $newTitle = $request->input("title");
        $author = $request->input("author");

        return response("book with ID $id was updated to $newTitle - $author");
    }

    public function destroy(string $id) {
        return response("book with ID = $id was deleted.");
    }
}
