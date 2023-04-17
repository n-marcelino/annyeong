<img class="w-48 mr-6 mb-6" src="{{$product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png')}}" alt=""/>
<h2 class="text-center">
    {{$product['name']}}
</h2>
<p class="text-center">
    {{$product['price']}}
</p>
<p class="text-center">
    In-stock: {{$product['stock']}}
</p>
<p class="text-center">
    {{$product['description']}}
</p>
<a href="/products/{{$product -> id}}/edit">
    Edit
</a>
<br>
<form method="POST" action="/products/{{$product -> id}}">
    @csrf
    @method('DELETE')
    <button>Delete</button>
</form>
<a href="/" class="text-black ml-4"> Back </a>


