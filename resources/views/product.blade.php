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
</head>

<body>


    <header class="header">
        <a href="/" class="logo">Annyeong</a>
        @auth
        <span class="welcome-user">, {{ auth()->user()->uname }}!</span>
        @endauth
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
            <div id="cart-btn" class="fas fa-cart-shopping"></div>
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


    <div class="container" id="home">
        <a href="/" class="back-button"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="hero-text">
            <h3>{{ $product['name'] }}</h3>
            <p> {{ $product['description'] }}</p>
            <h4>₱ {{ $product['price'] }}</h4>

            <h4 id="stock">In-stock: {{ $product['stock'] }}</h4><br>
            <button type="button"><a href="/products/create"> Add to cart <i class="fa-solid fa-cart-plus"></i> </a></button>

        </div>

        <img id="product-photo" src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png') }}" alt="">
    </div>



</body>
</html>
