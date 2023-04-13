<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Post Your Item
    </h2>
    <p class="mb-4">List Your K-Pop Merchandise</p>
</header>

<form method = "post" action="/products">
    @csrf
    <div class="mb-6">
        <label
            for="name"
            class="inline-block text-lg mb-2"
            >Product Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name" value = " {{old('name')}} "
        />

        @error('name')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="price" class="inline-block text-lg mb-2"
            >Price</label
        >
        <input
            type="number" step="0.01"
            class="border border-gray-200 rounded p-2 w-full"
            name="price" value = " {{old('price')}} "
        />

        @error('price')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="stock"
            class="inline-block text-lg mb-2"
            >Product Amount</label
        >
        <input
        type="number" step="1"
            class="border border-gray-200 rounded p-2 w-full"
            name="stock" value = " {{old('stock')}} "

        />

        @error('stock')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    {{-- <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
            Product Photo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="logo"
        />
    </div> --}}

    <div class="mb-6">
        <label
            for="description"
            class="inline-block text-lg mb-2"
        >
            Product description
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="description"
            
            rows="10"
            placeholder="Give as much relevant information about the product as you can."
        > {{old('description')}} </textarea>

        @error('description')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="Category_ID" class="inline-block text-lg mb-2"
            >Category ID</label
        >
        <input
            type="number" step="1"
            class="border border-gray-200 rounded p-2 w-full"
            name="Category_ID" value = " {{old('Category_ID')}} "
        />

        @error('Category ID')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="Fandom_ID" class="inline-block text-lg mb-2"
            >Fandom ID</label
        >
        <input
            type="number" step="1"
            class="border border-gray-200 rounded p-2 w-full"
            name="Fandom_ID" value = " {{old('Fandom_ID')}} "
        />

        @error('Fandom_ID')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="Seller_ID" class="inline-block text-lg mb-2"
            >Seller ID</label
        >
        <input
            type="number" step="1"
            class="border border-gray-200 rounded p-2 w-full"
            name="Seller_ID" value = " {{old('Seller_ID')}} "
        />

        @error('Seller_ID')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Post
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>