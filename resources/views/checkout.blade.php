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
            <h3>Products Ordered</h3>

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->totalPrice }}</td>
        <td><img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"></td>
    </tr>
@endforeach

                    <tr>
                        <td colspan="3" style="text-align: right;">Total:</td>
                        <td>{{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>


    <table class="table">
        <tbody>
            <tr>
                <td>Amount</td>
                <td></td>
            </tr>
            <tr>
                <td>Delivery Fee</td>
                <td>₱ 60</td>
            </tr>
        </tbody>
    </table>

    <label for="payment">Choose your payment method:</label><br>
    <input type="radio" value="cash" name="payment"> <span>E-Wallet(Gcash,Maya,Coins,etc.)</span><br>
    <input type="radio" value="cash" name="payment"> <span>Credit/Debit Card</span><br>
    <input type="radio" value="cash" name="payment"> <span>Cash on Delivery</span><br>
    <button type="submit" class="btn btn-default">Checkout</button>
    </form>

</body>

</html>
