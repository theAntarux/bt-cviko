<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class NoteController extends Controller {
    public function index() {
        $notes = DB::table("notes")
            ->whereNull("deleted_at")
            ->orderBy("updated_at", "desc")
            ->get();

        return response()->json([
            "notes" => $notes
        ], Response::HTTP_OK);
    }

    public function store(Request $request) {
        DB::table("notes")->insert([
            "user_id" => $request->user_id,
            "title" => $request->title,
            "body" => $request->body,
            "status" => $request->status ?? "draft",
            "is_pinned" => $request->is_pinned ?? false,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        return response()->json([
            "message" => "Poznámka bola úspešne vytvorená."
        ], Response::HTTP_CREATED);
    }

    public function show(string $id) {
        $note = DB::table("notes")
            ->whereNull("deleted_at")
            ->where("id", $id)
            ->first();

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            "note" => $note
        ], Response::HTTP_OK);
    }

    public function update(Request $request, string $id) {
        $note = DB::table("notes")->where("id", $id)->first();

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        DB::table("notes")
            ->where("id", $id)
            ->update([
                "title"       => $request->title,
                "body"        => $request->body,
                "status"      => $request->status,
                "is_pinned"   => $request->is_pinned,
                "updated_at"  => now(),
            ]);

        return response()->json([
            "message" => "Poznámka bola úspešne aktualizovaná."
        ], Response::HTTP_OK);
    }

    public function destroy(string $id) {
        $note = DB::table("notes")
            ->where("id", $id)
            ->whereNull("deleted_at")
            ->first();

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená alebo už odstránená."
            ], Response::HTTP_NOT_FOUND);
        }

        DB::table("notes")
            ->where("id", $id)
            ->update([
                "deleted_at"  => now(),
                "updated_at"  => now(),
            ]);

        return response()->json([
            "message" => "Poznámka odstránená."
        ], Response::HTTP_OK);
    }

    public function pinnedNotes() {
        $notes = DB::table("notes")
            ->whereNull("deleted_at")
            ->where("is_pinned", true)
            ->orderBy("updated_at", "desc")
            ->get();

        return response()->json([
            "pinned_notes" => $notes
        ], Response::HTTP_OK);
    }
}
