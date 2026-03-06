<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private $products = [
        ['id' => 1, 'name' => 'iPhone 14',          'price' => 899.00, 'stock' => 12],
        ['id' => 2, 'name' => 'Wireless Mouse',      'price' => 29.99,  'stock' => 45],
        ['id' => 3, 'name' => 'Mechanical Keyboard', 'price' => 119.00, 'stock' => 8],
        ['id' => 4, 'name' => '27" 4K Monitor',      'price' => 349.00, 'stock' => 6],
        ['id' => 5, 'name' => 'USB-C Hub',           'price' => 49.00,  'stock' => 33],
    ];
    
    public function index() {
        return $this->products;
    }

    public function create() {
        return "Produkt vytvoreny.";
    }

    public function store(Request $request) {
        return "Produkt ulozeny.";
    }

    public function show(string $id) {
        return "Produkt s id: " . $id;
    }

    public function edit(string $id) {
        return "Upravujem produkt s id: " . $id;
    }

    public function update(Request $request, string $id) {
        return "Produkt s id: " . $id . " bol aktualizovany.";
    }

    public function destroy(string $id){
        return "Produkt s id: " . $id . " bol zmazany.";
    }
}
