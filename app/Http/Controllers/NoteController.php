<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Note;

class NoteController extends Controller {
    public function index() {
        $notes = Note::query()
            ->orderByDesc("updated_at")
            ->get();

        return response()->json(["notes" => $notes], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $note = Note::create([
            "user_id"  => $request->user_id,
            "title"    => $request->title,
            "body"     => $request->body,
            "status"   => $request->status ?? "draft",
            "is_pinned"=> $request->is_pinned ?? false,
        ]);

        return response()->json([
            "message" => "Poznámka bola úspešne vytvorená.",
            "note"    => $note
        ], Response::HTTP_CREATED);
    }

    public function show(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json(["note" => $note], Response::HTTP_OK);
    }

    public function update(Request $request, string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        $note->update([
            "title" => $request->title,
            "body"  => $request->body,
        ]);

        return response()->json(["note" => $note], Response::HTTP_OK);
    }

    public function destroy(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json([
                "message" => "Poznámka nenájdená."
            ], Response::HTTP_NOT_FOUND);
        }

        $note->delete();

        return response()->json([
            "message" => "Poznámka bola úspešne odstránená."
        ], Response::HTTP_OK);
    }

    public function pinnedNotes() {
        $notes = Note::where("is_pinned", true)
            ->orderByDesc("updated_at")
            ->get();

        return response()->json([
            "pinned_notes" => $notes
        ], Response::HTTP_OK);
    }

    public function publish(string $id) {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(["message" => "Poznámka nenájdená."], Response::HTTP_NOT_FOUND);
        }

        $note->publish();

        return response()->json(["note" => $note], Response::HTTP_OK);
    }

    public function search(Request $request) {
        $q = trim((string) $request->query("q", ""));

        $notes = Note::searchPublished($q);

        return response()->json([
            "query" => $q,
            "notes" => $notes
        ], Response::HTTP_OK);
    }
}
