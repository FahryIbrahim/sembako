<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class esp32Controller extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('esp32', compact('products'));
    }
}
