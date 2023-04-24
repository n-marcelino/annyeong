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

    <link rel="stylesheet" href="{{ url('css/manage.css') }}">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/confirmation.js') }}"></script>
    <title>Manage your Products</title>

</head>

<body>
    <div class="container">
    <header>
        <h1 class="text-3xl text-center font-bold text-pink-900 my-6 uppercase">
            Seller's Dashboard
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm mt-28 mb-40">
        <tbody>
            @unless ($products->isEmpty())
                @foreach ($products as $product)
                    <tr class="border-gray-300">
                        <td class="px-2 py-6 border-t border-b text-base">
                            <a href="/products/{{ $product->id }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="px-2 py-6 border-t border-b border-gray-300 text-base">
                            {{ $product->orders_count }}
                        </td>
                        <td class="px-2 py-6 border-t border-b border-gray-300 text-base">
                            <a href="/products/{{ $product->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-2 py-6 border-t border-b border-gray-300 text-base">

                            <form method="POST" action="/products/{{ $product->id }}" id="delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-700" onclick="return showConfirmation()"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-2 py-6 border-t border-b border-gray-300 text-base">
                        <p class="text-center">Annyeong! You don't have any posts yet.</p>
                    </td>
                </tr>
            @endunless

        </tbody>
    </table>

    <a href="/" class="back-button" id="btn1"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <a href="/products/create" class="shop-button" id="btn2"><i class="fa-solid fa-plus"></i></i>Add item</a>
    </div>
</body>

</html>
