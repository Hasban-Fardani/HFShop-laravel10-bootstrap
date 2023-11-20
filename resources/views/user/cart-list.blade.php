@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>My Cart</h1>
        <div class="cart-container mt-4">
            @foreach ($carts as $cart)
                <div class="cart-item">
                    <img src="{{$cart->product->image}}" alt="{{$cart->product->image}}" width="100">
                    <div class="cart-description">
                        <h5>{{ $cart->product->name }}</h5>
                        <p>QTY: {{ $cart->quantity }}</p>
                        <p>Price: Rp.{{ number_format($cart->product->price, 0, ',', '.') }}</p>
                        <p>Total: Rp.{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</p>
                        <form action="{{route('user.orders.create')}}" method="get">
                            <input type="number" name="cart_id" value="{{$cart->id}}" hidden>
                            <input type="number" name="product_id" value="{{$cart->product->id}}" hidden>
                            <input type="number" name="quantity" value="{{$cart->quantity}}" hidden>
                            <button type="submit" class="btn btn-primary btn-order">Order</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('custom_css')
    <style>
        .cart-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px 
        }

        .cart-item {
            display: flex;
            gap: 20px;
            border: solid gray 2px;
            border-radius: 10px;
            padding: 10px;
        }

        .cart-description {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .cart-description p {
            margin-bottom: 0;
        }

        .btn-order {
            width: 100px;
        }
    </style>
@endsection
