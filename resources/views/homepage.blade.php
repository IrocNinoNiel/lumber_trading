@extends('layouts.homeApp')

@section('content')

<div class="container">
    <h2>Products</h2>

    @foreach ($products as $product)
        <div class="{{$arrayOverlay[$loop->iteration-1]['name']}}" style="background-image: url(/css/Product/{{$product->product_img}});">
            <div class="{{$arrayOverlay[$loop->iteration-1]['overlay-name']}}">
                <button onclick="document.location='{{ route('cart.addcart',$product->id) }}'">{{$product->name}}</button>
            </div>
        </div>
    @endforeach
</div>
@endsection
