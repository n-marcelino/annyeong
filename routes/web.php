<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;


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
Route::get('/', [ProductsController::class, 'index']);

//create form
Route::get('/products/create', [ProductsController::class, 'create'])->middleware('auth');

//store product listings
Route::post('/products', [ProductsController::class, 'store'])->middleware('auth');

//seller's dashboard
Route::get('/products/manage', [ProductsController::class, 'manage'])->middleware('auth');

//single product
Route::get('/products/{product}', [ProductsController::class, 'show']);

//edit form
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->middleware('auth');

//update product listing
Route::put('/products/{product}', [ProductsController::class, 'update'])->middleware('auth');

//remove listed product
Route::delete('/products/{product}', [ProductsController::class, 'remove'])->middleware('auth');

//redirect to register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class, 'store']);

//redirect to login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//add to cart
Route::post('/add_to_cart', [ProductsController::class, 'addToCart']);

//show user cart
Route::get('/cartlist', [ProductsController::class, 'cartlist'])->middleware('auth');

//delete product from user cart
Route::get('/removecart/{id}', [ProductsController::class, 'removecart']);

//updatecart
Route::post('/updatecart/{cart_id}', [ProductsController::class, 'updatecart']);

//checkout
Route::get('/checkout', [ProductsController::class, 'checkout'])->middleware('auth');

//orderplaced
Route::post('/orderplaced', [ProductsController::class, 'orderplaced']);






