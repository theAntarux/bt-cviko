<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder {
    public function run() {
        $now = now();

        DB::table("notes")->insert([
            ["user_id" => 1, "title" => "Plán na Q2", "body" => "Zvýšiť predaje o 15%", "status" => "published", "is_pinned" => true, "created_at" => $now, "updated_at" => $now],
            ["user_id" => 1, "title" => "Nápad na appku", "body" => "Aplikácia na sledovanie návykov", "status" => "draft", "is_pinned" => false, "created_at" => $now, "updated_at" => $now],
            ["user_id" => 2, "title" => "Recept na lasagne", "body" => "Bechamel + 3 druhy syra", "status" => "published", "is_pinned" => false, "created_at" => $now, "updated_at" => $now],
            ["user_id" => 2, "title" => "Úlohy na pondelok", "body" => null, "status" => "draft", "is_pinned" => true, "created_at" => $now, "updated_at" => $now],
            ["user_id" => 1, "title" => "Dovolenka Grécko 2026", "body" => "Santorini + Mykonos", "status" => "published", "is_pinned" => true, "created_at" => $now, "updated_at" => $now],
            ["user_id" => 2, "title" => "Nákupný zoznam", "body" => "mlieko, chlieb, vajcia", "status" => "archived", "is_pinned" => false, "created_at" => $now, "updated_at" => $now],
        ]);
    }
}
