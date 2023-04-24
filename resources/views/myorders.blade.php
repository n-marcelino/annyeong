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

    <link rel="stylesheet" href="{{ url('css/cartlist.css') }}">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/confirmation.js') }}"></script>
    <title>Your Cart</title>

</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-3xl text-center font-bold text-pink-900 my-6 uppercase">
                Your Orders
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm mt-20 mb-40">
            <tbody>

                @unless ($orders->isEmpty())
                    @foreach ($orders as $product)
                        <tr class="border-gray-300">
                            <td class="px-2 py-6 border-t border-b text-base">
                                <img id="product-photo"
                                     src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png') }}"
                                     alt="">
                            </td><td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $product->quantity }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $product->name }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $product->status }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $product->payment_method }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $product->payment_status }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h4>₱ {{ $product->price }}</h4>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h4>₱ {{ $product->price * $product->quantity }}</h4>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-2 py-6 border-t border-b border-gray-300 text-base">
                            <p class="text-center">Annyeong! Your cart is currently empty.</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>

        <a href="/" class="back-button" id="btn1"><i class="fa-solid fa-arrow-left"></i> Back</a>

    </div>
</body>



</html>
