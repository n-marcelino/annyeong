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

    <title>Item Creation Form</title>

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
    <div class="bg-white border border-gray-200 p-10 rounded-3xl max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-3xl font-bold mb-1 text-pink-900">
                Sell Your Product
            </h2>
            <p class="mb-4 text-gray-400">Create Here Your K-Pop Merchandise</p>
        </header>

        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mt-8 mb-2 text-pink-900">Product Name</label>
                <input type="text" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full"
                    name="name"value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2 text-pink-900">Price</label>
                <input type="number" step="0.01" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full"
                    name="price" value="{{ old('price') }}" />

                @error('price')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stock" class="inline-block text-lg mb-2 text-pink-900">Quantity</label>
                <input type="number" step="1" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full"
                    name="stock" value="{{ old('stock') }}" />

                @error('stock')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="inline-block text-lg mb-2 text-pink-900">
                    Product Photo
                </label>
                <input type="file" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full" name="photo" />

                @error('photo')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2 text-pink-900">
                    Product description
                </label>
                <textarea class="border-[3px] border-pink-900 rounded-2xl p-2 w-full" name="description" rows="10"
                    placeholder="Give as much relevant information about the product as you can.">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2 text-pink-900">Category</label>
                <input type="text" step="1" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full"
                    name="category" value="{{ old('Category_ID') }}" />

                @error('category')
                    <p class=" text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="fandom" class="inline-block text-lg mb-2 text-pink-900">Fandom</label>
                <input type="text" step="1" class="border-[3px] border-pink-900 rounded-2xl p-2 w-full"
                    name="fandom" value=" {{ old('Fandom_ID') }} " />

                @error('fandom')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-pink-900 text-white rounded py-2 px-4 hover:bg-pink-950">
                    Post your Product
                </button>

                <a href="/" class="bg-gray-500 py-2 px-4 rounded text-white ml-4 text-lg"> Back </a>
            </div>
        </form>
    </div>




</body>

</html>
