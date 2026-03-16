<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::orderBy("name")->get();

        return response()->json([
            "categories" => $categories
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $category = Category::create([
            "name"  => $request->name,
            "color" => $request->color ?? "#808080",
        ]);

        return response()->json([
            "message"  => "Kategória bola úspešne vytvorená.",
            "category" => $category
        ], Response::HTTP_CREATED);
    }

    public function show(string $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Kategória nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            "category" => $category
        ], Response::HTTP_OK);
    }

    public function update(Request $request, string $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Kategória nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        $category->update([
            "name"  => $request->name,
            "color" => $request->color ?? $category->color,
        ]);

        return response()->json([
            "message"  => "Kategória bola aktualizovaná.",
            "category" => $category
        ], Response::HTTP_OK);
    }

    public function destroy(string $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "Kategória nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        $category->delete();

        return response()->json([
            "message" => "Kategória bola úspešne odstránená."
        ], Response::HTTP_OK);
    }
}
