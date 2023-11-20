@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            <span>Product Details</span>
            <a href="{{ route('products') }}" class="btn btn-outline-secondary ml-2">Back</a>
        </h1>
    </div>
    <div class="container d-flex flex-column flex-md-row justify-content-center mt-3 gap-3">
        <div class="w-50">
            <div class="">
                <img src="{{ $product->image }}" class="card-img-top rounded" alt="{{ $product->name }}" width="200px">
            </div>
        </div>
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title mt-3">{{ $product->name }}</h3>
                <hr>
                <h5>Description</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h5>Price</h5>
                {{-- show price here which has formated int to price --}}
                <p class="card-text">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                <h5>Category</h5>
                <p class="card-text">{{ $product->category->name }}</p>
                <h5>Stock</h5>
                <p class="card-text">{{ $product->stock }}</p>
                <hr>
                <div>
                    <button type="button" class="btn btn-outline-light" onclick="addQuantity()">+</button>
                    <input type="text" name="quantity" id="quantity" min="1" max="{{ $product->stock }}"
                        value="1" disabled class="px-2 mx-2" style="width: 50px;">
                    <button type="button" class="btn btn-outline-light" onclick="minQuantity()">-</button>
                    <br> <br>
                </div>
                <div class="d-flex">
                    <form action="{{ route('user.orders.create', $product->id) }}" method="GET">
                        {{-- @csrf --}}
                        <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                        <input type="number" name="quantity" id="order_quantity" value="1" hidden>
                        <button type="submit" value="order" class="btn btn-primary">Order Now</button>
                    </form>
                    <form action="{{ route('user.carts.store', $product->id) }}" method="POST">
                        @csrf
                        <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                        <input type="number" name="quantity" id="cart_quantity" value="1" hidden>
                        <button type="submit" class="btn" value="cart">@include('icons.cart')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let q = document.getElementById('quantity');
        let order = document.getElementById('order_quantity');
        let cart = document.getElementById('cart_quantity');

        function addQuantity() {
            if (q.value < Number(q.max)) {
                q.value = Number(q.value) + 1;
                order.value = q.value;
                cart.value = q.value;
            }
        }

        function minQuantity() {
            if (q.value > Number(q.min)) {
                q.value = Number(q.value) - 1;
                order.value = q.value;
                cart.value = q.value;
            }
        }
    </script>
@endsection
{{-- @section('custom_js')
@endsection --}}
