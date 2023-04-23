<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="{{ url('css/product.css') }}">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/header-scroll.js') }}"></script>
</head>

<body>


    <header class="header">
        <div class="header-left">
            <a href="/" class="logo"><img class="logo-image" src="{{ url('/images/Annyeong.png') }}" alt="Logo">Annyeong <span class="welcome-user">@auth , {{ auth()->user()->uname }}! @endauth</span></a>
          </div>

        <div class="header-right">
          <nav class="navbar">
            <a href="/"><i class="fa-solid fa-house"></i></a>
            @auth
              <a href="/products/manage">dashboard</a>
            @else
              <a href="/login">login</a>
              <a href="/register">register</a>
            @endauth
            <a href="">About the Devs</a>
          </nav>
          <div class="icons">
            <a href="/cartlist"><div id="cart-btn" class="fas fa-cart-shopping"></div></a>
            @auth
              <div class="navbar-item">
                <form method="POST" action="/logout">
                  @csrf
                  <button type="submit" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                  </button>
                </form>
              </div>
            @endauth
          </div>
        </div>
      </header>

    <div class="container">
        <a href="/" class="back-button"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="hero-text">

            <h3>{{ $product['name'] }}</h3>
            <h3 id="label">Seller:</h3><h3 id="seller"> {{ $product->user ? $product->user->uname : 'Unknown' }}</h3>
            <p> {{ $product['description'] }}</p>
            <h4>₱ {{ $product['price'] }}</h4>

            <h4 id="stock">In-stock: {{ $product['stock'] }}</h4><br>
            @auth
    @php
        $inCart = false;
        $postedByUser = false;
        if (auth()->user()->cart !== null) {
            foreach(auth()->user()->cart as $item) {
                if ($item->id == $product->id) {
                    $inCart = true;
                    break;
                }
            }
        }

        if ($product->user_id == auth()->id()) {
            $postedByUser = true;
        }
    @endphp

    @if (!$inCart && !$postedByUser)
        <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
            <button class="btn btn-primary">Add To Cart <i class="fa-solid fa-cart-plus"></i></button>
        </form>
    @endif
@endauth


            <p class="tag-title">Tags</p>
            <button id="tag"> {{ $product['category'] }} </button> <button id="tag"> {{ $product['fandom'] }} </button>


        </div>

        <img id="product-photo" src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png') }}" alt="">
    </div>



</body>
</html>
