<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Edit Your Listing
    </h2>
    <p class="mb-4">Edit: {{$product->name}}</p>
</header>

<form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label
            for="name"
            class="inline-block text-lg mb-2"
            >Product Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"value ="{{$product->name}}"
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
            name="price" value ="{{$product->price}}"
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
            name="stock" value ="{{$product->stock}}"

        />

        @error('stock')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2">
            Product Photo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="photo"
        />

       {{-- //show image here --}}

        @error('photo')
            <p class = "text-red-500 text-xs mt-1"> {{$message}} </p>
        @enderror
    </div>

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
        >{{$product->description}}</textarea>

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
            name="Category_ID" value ="{{$product->Category_ID}}""
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
            name="Fandom_ID" value ="{{$product->Fandom_ID}}"
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
            name="Seller_ID" value ="{{$product->Seller_ID}}"
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