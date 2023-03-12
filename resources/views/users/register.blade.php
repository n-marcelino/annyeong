<h1>register</h1>

<form method="POST" action="/users">
    @csrf

    <div class="mb-2">
        <label for="fname" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="fname" value="{{old('fname')}}" placeholder="First Name" />

        @error('fname')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="lname" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="lname" value="{{old('lname')}}" placeholder="Last Name" />

        @error('lname')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="uname" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="uname" value="{{old('uname')}}" placeholder="Username" />

        @error('uname')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="birthday" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="birthday" value="{{old('birthday')}}" placeholder="Birthday (YYYY-MM-DD)" />

        @error('birthday')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="contact" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="contact" value="{{old('contact')}}" placeholder="Contact No." />

        @error('contact')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="street" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="street" value="{{old('street')}}" placeholder="Street" />

        @error('street')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="city" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="city" value="{{old('city')}}" placeholder="City" />

        @error('city')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="zip" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="zip" value="{{old('zip')}}" placeholder="ZIP" />

        @error('zip')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="email" class="inline-block text-lg mb-2"></label>
        <input type="email" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="email" value="{{old('email')}}" placeholder="Email" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="password" class="inline-block text-lg mb-2">
        </label>
        <input type="password" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="password" value="{{old('password')}}" placeholder="Password" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-2">
        <label for="password2" class="inline-block text-lg mb-2">
        </label>
        <input type="password" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="password_confirmation" placeholder="Confirm Password" />

        @error('password_confirmation')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

   
    <div class="mt-9 mb-6 text-center text-lg">
        <button type="submit" class="bg-main text-white py-3 px-[143px] rounded-[50px] hover:bg-black">
            SIGNUP
        </button>
    </div>

    <div class="mt-8 text-center">
        <p>
            Already have an account?
            <a href="/login" class="text-main">Login</a>
        </p>
    </div>
</form>