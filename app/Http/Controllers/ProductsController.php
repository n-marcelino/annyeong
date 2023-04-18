<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    //show all products
    public function index() {
           return view('productsHome', [
                'products' => Product::latest()->filter
                (request(['search'])) -> paginate(9)
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

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Product::create($formFields);

        return redirect('/');


    }

    //show edit product form
    public function edit(Product $product)
    {
        return view('edit', ['product' => $product]);
    }

    //store changes to edit
    public function update(Request $request, Product $product){
        $formFields = $request -> validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'Category_ID' => 'required',
            'Fandom_ID' => 'required',
            'Seller_ID' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $product->update($formFields);

        return back();


    }

    //delete listed product
    public function remove(Product $product){
        $product -> delete();
        return redirect('/');

    }

    //show single product
    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }



}
