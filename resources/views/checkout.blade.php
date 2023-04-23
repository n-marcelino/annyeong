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
    <link rel="stylesheet" href="{{ url('css/checkout.css') }}">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <div class="banner">
        <img class="logo-image" src="{{ url('/images/Annyeong.png') }}" alt="Logo">
        <h1 id="heading">Annyeong | Checkout</h1>
    </div>

    <div class="main-body">
        <div class="main-container1">
            <div class="column1">
                <h3 class="info"><i class="fa-solid fa-circle-info"></i>Buyer's Information</h3>
                <h2 class="name">{{ auth()->user()->lname }}, {{ auth()->user()->fname }}</h2>
                <i>
                    <h2 class="contact">{{ auth()->user()->contact }}</h2>
                </i>
            </div>
            <div class="column2">
                <form action="/orderplaced" method="POST">
                    @csrf
                    <div>
                        <i class="fa-sharp fa-regular fa-location-dot" id="loc"></i>
                        <textarea name="address" placeholder="Enter your exact receiving address: " class="form-control" id="address"></textarea><br>
                    </div>
            </div>
        </div>

        <div class="main-container2">
            <h3 id="tag">Products Ordered</h3>

            <table class="w-full table-auto rounded-sm mt-8 mb-16">
                <thead>
                    <tr>
                        <th class="text-left px-2 py-6 text-gray-400 font-normal"></th>
                        <th class="text-left px-2 py-6 text-gray-400 font-normal">Item</th>
                        <th class="text-left px-2 py-6 text-gray-400 font-normal">Price</th>
                        <th class="text-left px-2 py-6 text-gray-400 font-normal">Quantity</th>
                        <th class="text-left px-2 py-6 text-gray-400 font-normal">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr class="border-gray-300">
                            <td class="px-2 py-6 border-t border-b text-base">
                                <img id="product-photo"src="{{ asset('storage/' . $item->photo) }}"
                                    alt="{{ $item->name }}">
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $item->name }}</h3>
                            </td>

                            <td class="px-2 py-6 border-t border-b text-base">
                                <h4 id="price">₱ {{ $item->price }}</h4>
                            </td>

                            <td class="px-2 py-6 border-t border-b text-base">
                                <h4 id="quantity"> {{ $item->quantity }}</h4>

                            </td>

                            <td class="px-2 py-6 border-t border-b text-base">
                                <h4 id="price">₱ {{ $item->totalPrice }}</h4>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="main-container3">
            <h2 class="section-title">Payment Method</h2>
            <div class="payment-method">
                <label for="payment-ewallet">
                    <input type="radio" id="payment-ewallet" value="ewallet" name="payment">
                    <span><i class="fa-regular fa-wallet"></i> E-Wallet (Gcash, Maya, Coins, etc.) </span>
                </label>
                <label for="payment-card">
                    <input type="radio" id="payment-card" value="card" name="payment">
                    <span><i class="fa-regular fa-credit-card"></i>Credit/Debit Card</span>
                </label>
                <label for="payment-cod">
                    <input type="radio" id="payment-cod" value="cod" name="payment">
                    <span><i class="fa-sharp fa-regular fa-money-bill"></i>Cash on Delivery</span>
                </label>
            </div>
            <button type="submit" class="btn btn-default" id="btn">Checkout</button>
            </form>
        </div>


</body>

</html>
