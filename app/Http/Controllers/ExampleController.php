<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ExampleController extends Controller {
    public function showForm() {
        return view("example.form");
    }

    public function processForm(Request $request){
        $data = $request->only(["n"]);
        //$n = $request->input("n");

        $sequence = [];
        $a = 0;
        $b = 1;

        for ($index = 0; $index < $data["n"]; $index++) {
            $sequence[] = $a;
            [$a, $b] = [$b, $a + $b];
        }

        return view("example.show", [
            "n" => $data["n"],
            "sequence" => $sequence,
        ]);
    }
}