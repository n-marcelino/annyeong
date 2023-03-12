<h1>Login</h1>

<form method="POST" action="/users/authenticate">
    @csrf



    <div class="mb-2">
        <label for="email" class="inline-block text-lg mb-2">
        </label>
        <input type="text" class="rounded-[50px] bg-input placeholder-gray-600 text-center p-2 w-full" name="email" value="{{old('uname')}}" placeholder="Email" />

        @error('uname')
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

   
    <div class="mt-9 mb-6 text-center text-lg">
        <button type="submit" class="bg-main text-white py-3 px-[143px] rounded-[50px] hover:bg-black">
            SIGN IN
        </button>
    </div>

    <div class="mt-8 text-center">
        <p>
            Don't have an account yet?
            <a href="/register" class="text-main">Register</a>
        </p>
    </div>
</form>