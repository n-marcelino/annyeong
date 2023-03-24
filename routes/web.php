<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

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
