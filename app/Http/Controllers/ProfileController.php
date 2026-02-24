<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function showForm() {
        $roles = [
            "student" => "Študent",
            "teacher" => "Učiteľ",
        ];

        $skills = ["PHP", "JavaScript", "HTML", "CSS"];

        return view("profile.form", ["roles" => $roles, "skills" => $skills]);
    }

    public function processForm(Request $request) {
        $data = $request->only(["name", "email", "age", "role", "skills"]);
        $data["skills"] = $data["skills"] ?? [];

        $additional_data = [
            "isAdult" => (int) $data["age"] >= 18 ? "plonelty/a" : "neplnolety/a",
            "skillsCount" => count($data["skills"]),
            "roleLabel" => $data["role"] === "teacher" ? "ucitel" : "student",
        ];

        return view("profile.show", compact("data", "additional_data"));
    }
}