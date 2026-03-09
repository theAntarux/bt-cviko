<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run() {
        $now = now();

        DB::table("users")->insert([
            [
                "name" => "Dávid Držík",
                "email" => "ddrzik@ukf.sk",
                "password" => Hash::make("heslo123"),
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Anna Nováková",
                "email" => "anna.novakova@gmail.com",
                "password" => Hash::make("heslo456"),
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Martin Kováč",
                "email" => "martin.kovac@centrum.sk",
                "password" => Hash::make("martin2023"),
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Lucia Horváthová",
                "email" => "lucia.h@gmail.com",
                "password" => Hash::make("lucia789"),
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Peter Varga",
                "email" => "peter.varga@zoznam.sk",
                "password" => Hash::make("varga101"),
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
