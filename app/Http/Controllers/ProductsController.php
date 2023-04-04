<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //show all products
    public function index() {
        return view('products', [
            
        ]);
    }

    //show single product
    public function show(){

    }
}
