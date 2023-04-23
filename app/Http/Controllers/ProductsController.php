<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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

    public function updateCart(Request $request, $cart_id)
{
    // validate the form data
    $request->validate([
        'quantity' => 'required|numeric|min:1'
    ]);

    $cart = Cart::find($cart_id);
    $cart->quantity = $request->input('quantity');
    $cart->save();

    return redirect('/cartlist');
}

    public function cartlist()
    {
        $userID= auth()->id();
        $products= DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userID)
        ->select('products.*', 'carts.id as cart_id', 'carts.quantity as cart_quantity')
        ->get();

        return view('cartlist', ['products'=>$products]);

    }

    public function removecart($id){
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    public function checkout()
{
    $userID = auth()->id();

    $cartItems = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userID)
        ->select('products.name', 'products.price', 'carts.quantity')
        ->get();

    $total = 0;
    foreach ($cartItems as $item) {
        $item->totalPrice = $item->price * $item->quantity;
        $total += $item->totalPrice;
    }

    return view('checkout', ['cartItems' => $cartItems, 'total' => $total]);
}


public function orderplaced(Request $request)
{
    $userID = auth()->id();
    $allcart = Cart::where('user_id', $userID)->get();
    foreach($allcart as $cart) {
        $order = new Order;
        $order->product_id = $cart['product_id'];
        $order->user_id = $cart['user_id'];
        $order->status = "pending";
        $order->payment_method = $request->payment;
        $order->payment_status = "pending";
        $order->address = $request->address;
        $order->save();

        $product = Product::find($cart['product_id']);
        $product->stock -= $cart['quantity'];

        // Check if the product's stock has reached 0
        if ($product->stock == 0) {
            $product->delete();
        } else {
            $product->save();
        }

        $allcart = Cart::where('user_id', $userID)->delete();
    }
    $request->input();
    return redirect('/');
}


}
