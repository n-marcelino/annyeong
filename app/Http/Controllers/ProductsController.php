<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //show all products
    public function index() {
        return view('productsHome', [
            'heading' => 'Our Products',
            'products' => Product::latest()->filter
            (request(['search'])) -> get()
        ]);
    }

    //show single product
    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }
}
