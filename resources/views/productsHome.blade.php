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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/productsHome.css') }}">

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

    <header class="header">

        <a href="index.html" class="logo"> </i> Annyeong! </a>

        <nav class="navbar">
            <a href="#home"><i class="fa-solid fa-house"></i></a>
            @auth
            <span class ="font-bold uppercase">
                Welcome {{auth()->user()->uname}}
            </span>
            <a href="/products/manage">dashboard</a>
            @else
            <a href="/login">login</a>
            <a href="/login">register</a>
            @endauth
            <a href="">About the Devs</a>
        </nav>

        <div class="icons">
            <div id="cart-btn" class="fas fa-cart-shopping"></div>
        </div>

    </header>

    <div class="container" id="home">
        <div class="hero-text">
            <h3>Blackpink The Album</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id vestibulum urna. In lobortis, magna et
                feugiat tempus, eros elit.</p>
            <h4>₱2000.00</h4>
            <button type="button"><a href="#elect"> Explore more items! </a></button>
        </div>

        <img id="bp_album" src="{{ url('/images/bp_album.jpg') }}">
    </div>

    <div class="main-body">
        <div class="main-body-container">
            @include('partials._search')

            <div class="align-divs">
                <div class="filter">

                <h1 class="text-pink-900"> <i class="fa-solid fa-filter text-pink-900"></i> Search Filter</h1>
                <div class="categ-form">
                <h1><b>Category</b></h1>
                <form action="/">
                    <input type="checkbox" value="Clothing">
                    <label for="Clothing" style="font-size: 14px;"> Clothing</label><br>

                    <input type="checkbox" value="Clothing">
                    <label for="Accessories" style="font-size: 14px;"> Accessories</label><br>

                    <input type="checkbox" value="Clothing">
                    <label for="Album" style="font-size: 14px;"> Album</label><br>

                    <input type="checkbox" value="Clothing">
                    <label for="Photocard" style="font-size: 14px;"> Photocard</label><br>
                  </form>

                  <h1><b>Fandom</b></h1>
                  <form action="/">
                    <input type="checkbox" value="Blink">
                    <label for="Blink" style="font-size: 14px;"> Blink</label><br>

                    <input type="checkbox" value="Army">
                    <label for="Army" style="font-size: 14px;"> Army</label><br>

                    <input type="checkbox" value="Once">
                    <label for="Once" style="font-size: 14px;"> Once</label><br>

                    <input type="checkbox" value="Reveluv">
                    <label for="Reveluv" style="font-size: 14px;"> Reveluv</label><br>

                    <input type="checkbox" value="Swith">
                    <label for="Swith" style="font-size: 14px;"> Swith</label><br>

                    <input type="checkbox" value="Fearnot">
                    <label for="Fearnot" style="font-size: 14px;"> Fearnot</label><br>
                  </form>

                  <h1><b>Price</b></h1>
                  <form action="/">
                    <input type="checkbox" value="lowest">
                    <label for="lowest" style="font-size: 14px;"> Less than ₱100 </label><br>

                    <input type="checkbox" value="range">
                    <label for="range" style="font-size: 14px;"> ₱100-₱500</label><br>

                    <input type="checkbox" value="highest">
                    <label for="highest" style="font-size: 14px;"> ₱500 above</label><br>
                  </form>



                </div>
                </div>

                <div class="align-container">
                @unless (count($products) == 0)

                    @foreach ($products as $product)
                        <div class="product-container">
                            <div class="product-description">
                                <img class="w-48 mr-6 mb-6" src="{{$product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png')}}" alt=""/>
                                <h2 class="text-pink-800 text-lg font-semibold mt-6 ml-4 ">
                                    <a href="/products/{{ $product['id'] }}">{{ $product['name'] }}
                                </h2>
                                <p class="ml-4 font-semibold">
                                    ₱ {{ $product['price'] }}
                                </p>
                                <p class="ml-4 text-xs text-emerald-600">
                                    In-stock: {{ $product['stock'] }}
                                </p>
                                <p class="mt-2 ml-4 mr-4 text-sm italic ">
                                    {{ $product['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No products found.</p>
                @endunless
                </div>

            </div>

            <!--paginate page-->
            <div class="mt-6 p-4">
                {{$products->links()}}
            </div>

        </div>

        <form method="POST" action="/logout">
            @csrf
            @auth
            <button type="submit">
                Logout
            </button>
        </form>

        <br><br>

        <a href="/products/create"> List Your Item </a>
        @endauth
    </div>
    </div>
</body>

</html>
