<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
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
    public function show(Product $product)
    {
        // Check if the user has the product in their orderlist
        $hasProduct = auth()->user()->orders()->where('product_id', $product->id)->exists();
    
        // Fetch comments for the product
        $comments = Comment::where('product_id', $product->id)->get();
    
        return view('product',['product' => $product], compact('product', 'comments', 'hasProduct'));
    }
    

    //manage posts
    public function manage()
    {
        $products = Product::withCount(['orders' => function ($query) {
            $query->select(DB::raw('sum(quantity)'));
        }])
        ->where('user_id', auth()->user()->id)
        ->get();

    return view('manage', compact('products'));
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
    ->select('products.name', 'products.price', 'products.photo', 'carts.quantity')
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
        $product = Product::find($cart['product_id']);

        $order = new Order;
        $order->product_id = $cart['product_id'];
        $order->user_id = $cart['user_id'];
        $order->status = "pending";
        $order->payment_method = $request->payment;
        $order->payment_status = "pending";
        $order->product_name = $product->name;
        $order->product_price = $product->price;
        $order->product_photo = $product->photo;
        $order->address = $request->address;
        $order->quantity = $cart['quantity'];
        $order->save();

        $product->stock -= $cart['quantity'];
        $product->save();
        
    }

    Cart::where('user_id', $userID)->delete();

    $request->input();
    return redirect('/');
    }


    public function myorders()
    {
    $userID = auth()->id();
    $orders = Order::where('user_id', $userID)->get();

    $total = 0;
    foreach ($orders as $item) {
        $item->totalPrice = $item->product_price * $item->quantity;
        $total += $item->totalPrice;
    }

    return view('myorders', ['orders'=>$orders, 'total' => $total]);
    }



}
