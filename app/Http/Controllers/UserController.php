<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function register() {
        return view('users.register');
    }

    //create new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'fname' => ['required', 'min:2'], 
            'lname' => ['required', 'min:2'], 
            'uname' => ['required', 'min:3'], 
            'birthday' => ['required', 'min:10'],
            'contact' => ['required', 'min:11'],
            'street' => ['required'],
            'city' => ['required'],
            'zip' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //encrypt password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user 
        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'Account has been created. You are now logged in!');
    }
}
