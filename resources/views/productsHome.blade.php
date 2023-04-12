<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        .product-container {
            width: 190px;
            height: 254px;
            border-radius: 30px;
            background: #e0e0e0;
            box-shadow: 15px 15px 30px #bebebe,
                -15px -15px 30px #ffffff;
        }

    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        main: "#2B3F81",
                        hover: "#3C6DD0",
                        form: "#EEF4FF",
                        input: "#DCE4F4",
                        text: "AEAEAE"
                    },
                },
            },
        };
    </script>

</head>

<body>
    <a href="/login"> Login </a>
    </br>
    <a href="/register"> Register </a>
    </br>
    <form method="POST" action="/logout">
        @csrf
        <button type="submit">
            Logout
        </button>
    </form>

    <br><br>

    <h1>Home Page</h1>
    <h1>{{$heading}}</h1>

    @include('partials._search')
   

   @unless (count($products) == 0)

    @foreach($products as $product)
        <div class="product-container">
            <div class="product-description">
                <h2 class="text-center text-blue-500 underline">
                    <a href="/products/{{$product['id']}}">{{$product['name']}}
                </h2>
                <p class="text-center">
                    {{$product['price']}}
                </p>
                <p class="text-center">
                    In-stock: {{$product['stock']}}
                </p>
            </div>
        </div>
    @endforeach

    @else
    <p>No products found.</p>
    @endunless

</body>

</html>

