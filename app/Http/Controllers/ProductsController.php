<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    //show all products
    public function index() {
           return view('productsHome', [
                'products' => Product::latest()->filter
                (request(['search'])) -> paginate(6)
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
            'category' => 'required',
            'fandom' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

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
            'category' => 'required',
            'fandom' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $product->update($formFields);

        return redirect('/');


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

    //manage posts
    public function manage() {
        return view('manage', ['products' => auth()->user()->products()->get()]);
    }

    public function addToCart(Request $request)
    {
        if(auth()->check())
        {  
            $cart= new Cart;
            $cart->user_id = auth()->id();
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    
    public function cartlist()
    {
        $userID= auth()->id();
        $products= DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userID)
        ->select('products.*', 'carts.id as cart_id')
        ->get();

        return view('cartlist', ['products'=>$products]); 
    }

    public function removecart($id){
        Cart::destroy($id);
        return redirect('/cartlist');
    }

}
