@extends('layouts.admin')
@section('title', 'Edit Order')
@section('back')
    <a href="{{route('admin.orders.index')}}" class="btn btn-outline-primary ml-2"> Back </a>
@endsection
@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-center my-3 gap-3">
        <div class="w-50">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ $order->product->image }}" class="rounded" alt="{{ $order->product->name }}" width="250px">
            </div>
        </div>
        <div class="card w-50">
            <div class="card-body">
                <h3 class="card-title mt-3">Order #{{ $order->code }}</h3>
                <hr>
                <h5>Name</h5>
                <p class="card-text">{{ $order->product->name }}</p>
                <h5>Price</h5>
                {{-- show price here which has formated int to price --}}
                <p class="card-text">Rp.{{ number_format($order->product->price, 0, ',', '.') }}</p>
                <h5>User</h5>
                <p class="card-text">{{ $order->user->name }}</p>
                <h5>Status</h5>
                <form action="{{ route('admin.orders.update', $order->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($order->status != 'sampai')
                    <select name="status" id="" class="form-select">
                        <option value="dikemas">Dikemas</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="sampai">Sampai</option>
                    </select>
                    @else
                         <select name="status" id="" class="form-select" disabled>
                        <option value="" selected>Selesai</option>
                    </select>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-outline-primary mt-2">Edit</button>
                </form>
                {{-- <p class="card-text">{{ $order->status }}</p> --}}
                {{-- <hr> --}}
                
            </div>
        </div>
    </div>
@endsection