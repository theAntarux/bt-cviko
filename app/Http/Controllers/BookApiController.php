<?php

namespace App\Http\Controllers;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookApiController extends Controller {
    private $books = [
        ["id" => 1, "title" => "Book 1", "author" => "John Doe"],
        ["id" => 2, "title" => "Book 2", "author" => "Sam Doe"],
        ["id" => 3, "title" => "Book 3", "author" => "Donald Doe"],
    ];

    // thanks to these amazing 2 functions, we managed to get speeds of slovak gov websites with large local datasets, absolute cinema fr fr

    private function getBookTitle(string $id) {
        foreach ($this->books as $book) {
            if ($book["id"] === (int)$id) {
                return $book["title"];
            }
        }

        return "";
    }

    private function getBookAuthor(string $id): string {
        foreach ($this->books as $book) {
            if ($book["id"] === (int)$id) {
                return $book["author"];
            }
        }

        return "";
    }

    public function index() {
        return response()->json([
            "data" => $this->books
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $book = [
            "title" => $request->input("title"),
            "author" => $request->input("author"),
        ];

        return response()->json([
            "message" => "book created",
            "data" => $book,
        ], Response::HTTP_CREATED);
    }

    public function show(string $id) {
        $book = [
            "id" => $id,
            "title" => $this->getBookTitle($id),
            "author" => $this->getBookAuthor($id),
        ];

        return response()->json([
            "data" => $book
        ], Response::HTTP_OK);
    }

    public function update(Request $request, string $id) {
        $book = [
            "id" => $id,
            "title" => $request->input("title"),
            "author" => $request->input("author"),
        ];

        return response()->json([
            "message" => "book updated $id",
            "data" => $book,
        ], Response::HTTP_OK);
    }

    public function destroy(string $id) {
        return response()->json([
            "message" => "book deleted $id",
        ], Response::HTTP_OK);
    }
}
