<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function home() {
        return "Home";
    }

    public function about() {
        return "About";
    }

    public function contact() {
        return "Contact";
    }
}
