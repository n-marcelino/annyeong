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
Route::get('/products/create', [ProductsController::class, 'create']);

//store product listings
Route::post('/products', [ProductsController::class, 'store']);

//single product
Route::get('/products/{product}', [ProductsController::class, 'show']);

//edit form
Route::get('/products/{product}/edit', [ProductsController::class, 'edit']);

//update product listing
Route::put('/products/{product}', [ProductsController::class, 'update']);

//remove listed product
Route::delete('/products/{product}', [ProductsController::class, 'remove']);

//redirect to register form
Route::get('/register', [UserController::class, 'register']);

//create new user
Route::post('/users', [UserController::class, 'store']);

//redirect to login form
Route::get('/login', [UserController::class, 'login']);

//log out user
Route::post('/logout', [UserController::class, 'logout']);

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);




