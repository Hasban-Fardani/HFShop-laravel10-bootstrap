@extends('layouts.app')

@php
    $user = auth()->user();
@endphp

@section('content')
    <div class="container mt-3">
        <h2>Order Confirmation</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">Price: Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="card-text">Quantity: {{ $quantity }}</p>
                        <p class="card-text">Total: Rp{{ number_format($product->price * $quantity, 0, ',', '.') }}</p>
                        <form action="{{ route('user.orders.store') }}" method="post">
                            @csrf

                            @if (!empty($cart_id))
                                <input type="number" name="cart_id" value="{{ $cart_id }}" hidden>
                            @endif
                            <input type="number" name="quantity" value="{{ $quantity }}" hidden>
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <label for="noter">Notes</label>

                            <textarea name="notes" id="" cols="30" rows="2" wrap="soft" class="form-control mb-2"
                                placeholder="Write your notes here"></textarea>

                            @if (!$user->province)
                                <label for="province_id">Province</label>
                                <select name="province_id" class="form-select mb-2" required>
                                    <option value="" disabled selected>select province</option>
                                    @foreach ($provinces as $province)
                                        @if (!empty($user->province->id))
                                            <option value="{{ $province->id }}" @selected($user->province->id == $province->id)>
                                                {{ $province->name }}</option>
                                        @else
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif

                            @if (!$user->city)
                                <label for="city_id">City</label>
                                <select name="city_id" class="form-select mb-2" required>
                                    @if (!$user->city)
                                        <option value="" disabled selected>Select City</option>
                                    @endif

                                    @foreach ($cities as $city)
                                        @if (!empty($user->city->id))
                                            <option value="{{ $city->id }}" @selected($user->city->id == $city->id)>
                                                {{ $city->name }}</option>
                                        @else
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif

                            <label for="address"> Address </label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control mb-2" required>{{ $user->address }}</textarea>

                            {{-- <label for="">Expedition</label>
                            <select name="expedition_id" id="" class="form-select">
                                @foreach ($expedition_prices as $ex_price)
                                    <option value="{{$ex_price->id}}">{{$ex_price->expedition->name}}-{{$ex_price->expedition->price}}</option>
                                @endforeach
                            </select> --}}
                            <label class="form-label">
                                Pay
                                <input type="number" name="total" id="total"
                                    value="{{ $product->price * $quantity }}" class="form-control">
                            </label>
                            <br>
                            {{-- <input type="number" name="total" value="{{}}" hidden> --}}
                            <button type="submit" class="btn btn-primary">Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script></script>
@endsection
