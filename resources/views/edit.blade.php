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

    <title>Edit Item Form</title>

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
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Your Listing
            </h2>
            <p class="mb-4">Edit: {{ $product->name }}</p>
        </header>

        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="name"value="{{ $product->name }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="number" step="0.01" class="border border-gray-200 rounded p-2 w-full" name="price"
                    value="{{ $product->price }}" />

                @error('price')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stock" class="inline-block text-lg mb-2">Product Amount</label>
                <input type="number" step="1" class="border border-gray-200 rounded p-2 w-full" name="stock"
                    value="{{ $product->stock }}" />

                @error('stock')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="inline-block text-lg mb-2">
                    Product Photo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />

                {{-- //show image here --}}

                @error('photo')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Product description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Give as much relevant information about the product as you can.">{{ $product->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Category</label>
                <input type="text" step="1" class="border border-gray-200 rounded p-2 w-full"
                    name="category" value="{{ $product->category }}""
        />

        @error('category')
    <p class = " text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="fandom" class="inline-block text-lg mb-2">Fandom</label>
                <input type="text" step="1" class="border border-gray-200 rounded p-2 w-full" name="fandom"
                    value="{{ $product->fandom }}" />

                @error('fandom')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-pink-900 text-white rounded py-2 px-4 hover:bg-pink-950">
                    Edit
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</body>

</html>
