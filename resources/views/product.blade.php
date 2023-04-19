<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>annyeong!</title>

    <link rel="stylesheet" href="{{ url('css/product.css') }}">

    <style>
        * {
            text-transform: capitalize;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #a2476a;
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<img class="w-48 mr-6 mb-6"
    src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png') }}" alt="" />
<h2 class="text-center">
    {{ $product['name'] }}
</h2>
<p class="text-center">
    {{ $product['price'] }}
</p>
<p class="text-center">
    In-stock: {{ $product['stock'] }}
</p>
<p class="text-center">
    {{ $product['description'] }}
</p>
@auth
    <a href="/products/{{ $product->id }}/edit">
        Edit
    </a>
    <br>
    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    @endauth
</form>
<a href="/" class="text-black ml-4"> Back </a>
</body>
</html>
