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

        .logo{
            width: 200px;
            height: 200px;
        }

        .brand{
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            top: 150px;
            left: -70px;
            color: white;
            z-index:999;
        }

        .logo-container {
            display: flex;
            justify-content: center;
        }


        .title{
            font-weight: bold;
            margin-left: 0;
            font-size: 50px;
        }

        .subtitle{
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
            z-index: 9999;
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
            margin-left: 30px;
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

<form method="POST" action="/users/authenticate">
    @csrf

    <div class="temp"></div>
    <div class="form-container">

        <div class="form-header">
            <h1 class=header1>Log in</h1>
            <h1 class=header2>Sign up</h1>
        </div>

        <div class="mb-2">
            <label for="email" class="inline-block text-lg mb-2">
            </label>
            <input type="text" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-20 p-2 w-9/12" name="email" value="{{old('uname')}}" placeholder="Email" />

            @error('email')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password" class="inline-block text-lg mb-2">
            </label>
            <input type="password" class="border-[3px] border-pink-900 rounded-[50px] bg-input placeholder-gray-600 text-center ml-16 mt-9 p-2 w-9/12" name="password" value="{{old('password')}}" placeholder="Password" />

            @error('password')
            <p class="text-red-500 text-xs mt-1 ml-20">{{$message}}</p>
            @enderror
        </div>


        <div class="mt-9 mb-6 text-center text-lg">
            <button type="submit" class="bg-main text-white font-bold mt-16 py-3 px-[143px] rounded-[50px] hover:bg-hover">
                SIGN IN
            </button>
        </div>

        <div class="mt-2 pb-32 text-center">
            <p>
                Don't have an account yet?
                <a href="/register" class="text-main">Register</a>
            </p>
        </div>
    </div>

    <div class="brand">
        <div class="logo-container">
            <img src="{{ url('/images/Annyeong 2.png') }}" class="logo" alt="">
        </div>
        <h1 class="title">annyeong!</h1>
        <h1 class="subtitle">Step into a K-pop lover's paradise with annyeong!
        <br> Your ultimate online destination for the hottest K-pop merch and more!</h1>
    </div>


</form>
