<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller {
    private array $posts = [
        [
            "id" => 1,
            "title" => "title1",
            "content" => "Lorem ipsum i guess",
            "category_id" => 1,
            "author_id" => 1,
        ],
        [
            "id" => 2,
            "title" => "title2",
            "content" => "Lorem ipsum i guess",
            "category_id" => 2,
            "author_id" => 2,
        ],
    ];

    public function index() {
        return response()->json($this->posts);
    } 

    public function store(Request $request) {
        return response()->json([
            "message" => "Post created successfully",
            "recieved_data" => $request->all(),
        ], 201);
    }

    public function show(string $id) {
        foreach ($this->posts as $post) {
            if ($post["id"] == $id) {
                return response()->json($post);
            }
        }

        return response()->json([
            "message" => "Post not found"
        ], 404);
    }

    public function update(Request $request, string $id) {
        return response()->json([
            "message" => "Post with ID $id was updated",
            "recieved_data" => $request->all(),
        ]);
    }

    public function destroy(string $id) {
        return response()->json([
            "message" => "Post with ID $id was deleted",
        ]);
    }
}
