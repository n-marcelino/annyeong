<!DOCTYPE html>
<a href="/">Back</a>
<h4>Products in Cart</h4>
@foreach($products as $product)
<img id="product-photo" src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('/images/no-image.png') }}" alt=""><br>
<h3>{{ $product->name }}</h3><br>
<p> {{ $product->description}}</p><br>
<h4>₱ {{ $product->price }}</h4><br>
<h4 id="stock">In-stock: {{ $product->stock }}</h4><br>
<a href="/removecart/{{$product->cart_id}}">Remove From Cart</a><br>
@endforeach
<button>Checkout</button>
</html>