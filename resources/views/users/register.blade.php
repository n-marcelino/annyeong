<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>annyeong!</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />






    <!-- Styles -->
    <style>
        body {
            background: #a2476a;
        }

        .temp {
            margin-bottom: 70px;
        }

        #blink_ec {
            opacity: 0.70;
            position: absolute;
            width: 1280px;
            height: 988px;
            left: -220px;
            top: -100px;
            overflow: visible;
        }

        .brand {
            position: relative;
            top: 310px;
            left: -20px;
            color: white;
            z-index: 9999;
        }

        .title {
            font-weight: bold;
            margin-left: 20rem;
            font-size: 50px;
        }

        .subtitle {
            margin-left: 4px;
            font-size: 20px;
            text-align: center;
        }

        .form-container {
            float: right;
            position: relative;
            right: 90px;
            background: white;
            border-radius: 25px;
            width: 40%;
        }

        .form-header {
            text-align: center;
            margin-top: 50px;
        }

        .header1,
        .header2 {
            display: inline;
            font-size: 45px;
        }

        .header1 {
            margin-left: 4px;
            margin-right: 70px;
            font-weight: bold;
            color: #a2476a;
        }

        .header2 {
            color: #CDCDCD;
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        main: "#a2476a",
                        hover: "#7A3751",
                        form: "#EEF4FF",
                        input: "#FFFFFF",
                        text: "AEAEAE"
                    },
                },
            },
        };
    </script>

</head>


<form method="POST" action="/users">
    @csrf

    <img id="blink_ec" src="{{url('/images/blink_ec.png')}}">

    <div class="temp"></div>

    <div class="form-container">

        <div class="form-header">
            <h1 class=header1>Sign up</h1>
            <h1 class=header2>Log in</h1>
        </div>


        <div class="mb-2">
            <label for="fname" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-20 p-2 w-9/12" name="fname" value="{{old('fname')}}" placeholder="First Name" />

            @error('fname')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="lname" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="lname" value="{{old('lname')}}" placeholder="Last Name" />

            @error('lname')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="uname" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="uname" value="{{old('uname')}}" placeholder="Username" />

            @error('uname')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="birthday" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-20 p-2 w-9/12" name="birthday" value="{{old('birthday')}}" placeholder="Birthday (YYYY-MM-DD)" />

            @error('birthday')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="contact" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="contact" value="{{old('contact')}}" placeholder="Contact No." />

            @error('contact')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="street" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="street" value="{{old('street')}}" placeholder="Street" />

            @error('street')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="city" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="city" value="{{old('city')}}" placeholder="City" />

            @error('city')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="zip" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="zip" value="{{old('zip')}}" placeholder="ZIP" />

            @error('zip')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email" class="inline-block text-lg mb-2"></label>
            <input type="email" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-20 p-2 w-9/12" name="email" value="{{old('email')}}" placeholder="Email" />

            @error('email')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password" class="inline-block text-lg mb-2">
            </label>
            <input type="password" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="password" value="{{old('password')}}" placeholder="Password" />

            @error('password')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password2" class="inline-block text-lg mb-2">
            </label>
            <input type="password" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-5 p-2 w-9/12" name="password_confirmation" placeholder="Confirm Password" />

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>


        <div class="mt-16 mb-6 text-center text-lg">
            <button type="submit" class="bg-main text-white py-3 px-[143px] rounded-[50px] hover:bg-hover">
                SIGNUP
            </button>
        </div>

        <div class="mt-4 pb-20 text-center">
            <p>
                Already have an account?
                <a href="/login" class="text-main">Login</a>
            </p>
        </div>
    </div>

    <div class="brand">
        <h1 class="title">annyeong!</h1>
        <h1 class="subtitle">Step into a K-pop lover's paradise with annyeong! <br> Your ultimate online destination for the hottest K-pop merch and more!</h1>
    </div>
</form>