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

    //list product form
    public function create(){
         return view('create');
    }

    //store listed product
    public function store(Request $request){
        $formFields = $request -> validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'Category_ID' => 'required',
            'Fandom_ID' => 'required',
            'Seller_ID' => 'required'
        ]);

        Product::create($formFields);

        return redirect('/');


    }

    //show single product
    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }

}
