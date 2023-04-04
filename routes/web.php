<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\UserController;
use App\Models\Product;
>>>>>>> Stashed changes

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//main page w/ all products
Route::get('/', function () {
    return view('productsHome', [
        'heading' => 'Our Products',
        'products' => Product::all()
    ]);
});

//singe product
Route::get('/products/{id}', function ($id) {
    return view('product', [
        'product' => Product::find($id)
    ]);
});
