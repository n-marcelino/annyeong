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

    <link rel="stylesheet" href="{{ url('css/orders.css') }}">

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
            <thead>
                <tr>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal"></th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Quantity</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Product</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Order Status</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Payment Method</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Payment Status</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal">Item Price</th>
                    <th class="text-left px-2 py-6 text-gray-400 font-normal tp">Total Price</th>
                </tr>
            </thead>
            <tbody>

                @unless ($orders->isEmpty())
                    @foreach ($orders as $order)
                        <tr class="border-gray-300">
                            <td class="px-2 py-6 border-t border-b text-base">
                                <img id="product-photo"
                                    src="{{ $order->product_photo ? asset('storage/' . $order->product_photo) : asset('/images/no-image.png') }}"
                                    alt="">
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $order->quantity }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $order->product_name }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $order->status }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base">
                                <h3>{{ $order->payment_method }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base text-left">
                                <h3>{{ $order->payment_status }}</h3>
                            </td>
                            <td class="px-2 py-6 border-t border-b text-base text-right">
                                <div class="price-wrap">
                                    <h4 class="price">₱ {{ $order->product_price }}</h4>
                                </div>
                            </td>
                            <td class="px-2 py-6 border-t border-b border-b text-base text-right">
                                <h4>₱ {{ $order->product_price * $order->quantity }}</h4>
                            </td>
                        </tr>
                    @endforeach
                    @else

                    <p class="text-center none">Annyeong! You do not have any orders yet.</p>

                @endunless

            </tbody>
        </table>




        <a href="/" class="back-button" id="btn1"><i class="fa-solid fa-arrow-left"></i> Back</a>

    </div>
</body>



</html>
