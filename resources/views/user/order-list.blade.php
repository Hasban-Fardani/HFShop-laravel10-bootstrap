@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>My Orders</h1>
        <div class="order-container mt-4">
            @foreach ($orders as $order)
                <div class="order-item">
                    <img src="{{$order->product->image}}" alt="{{$order->product->image}}" width="200">
                    <div class="order-description">
                        <h5>{{ $order->product->name }}</h5>
                        <p>QTY: {{ $order->quantity }}</p>
                        <p>Price: Rp.{{ number_format($order->product->price, 0, ',', '.') }}</p>
                        <p>Total: Rp.{{ number_format($order->product->price * $order->quantity, 0, ',', '.') }}</p>
                        <p>Status: {{ $order->status }}</p>
                        <form action="{{route('user.order.confirm', $order->id)}}" method="post">
                        @csrf
                        <a href="{{route('user.orders.show', $order->id)}}" class="btn btn-primary">Detail</a>
                        <button type="submit" class="btn btn-outline-secondary">Sampai</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('custom_css')
    <style>
        .order-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px 
        }

        .order-item {
            display: flex;
            gap: 20px;
            border: solid gray 2px;
            border-radius: 10px;
            padding: 10px;
        }

        .order-description {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .order-description p {
            margin-bottom: 0;
        }

        .btn-order {
            width: 100px;
        }
    </style>
@endsection
