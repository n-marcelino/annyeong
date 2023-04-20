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
    <title>Manage your Posts</title>

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
                            <a href="/products/{{ $product->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-2 py-6 border-t border-b border-gray-300 text-base">

                            <form method="POST" action="/products/{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-2 py-6 border-t border-b border-gray-300 text-base">
                        <p class="text-center">You don't have any posts yet.</p>
                    </td>
                </tr>
            @endunless

        </tbody>
    </table>

    <a href="/" class="back-button"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</body>

</html>
