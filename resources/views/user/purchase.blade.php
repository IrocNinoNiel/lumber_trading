@extends('layouts.homeApp')

@section('content')

@include('inc.message')

<div class="container">
    <h2>Purchases</h2>

    <div class="outer-border">
        <div class="customer-info">

            <label style="position: absolute;
            width: 173px;
            height: 30px;
            left: 40px;
            top: 20px;
            color:#0077B6">Customer Details</label>


            <label style="position: absolute;
            font-size: 14;
            left: 60px;
            top: 90px;">{{ Auth::user()->name }}</label>

            <label style="position: absolute;
            font-size: 14;
            left: 150px;
            top: 90px;">({{ Auth::user()->contact_number }})</label>

            <label style="position: absolute;
            font-size: 14;
            left: 400px;
            top: 90px;">  {{ Auth::user()->address }}</label>


            @if (Auth::user()->user_img == '')
                <img src="{{asset('css/profile/anon.jpg')}}"  style="position: absolute;
                width: 91px;
                height: 75px;
                left: 800px;
                top: 40px;
                background-size: cover;
                border-radius: 5px;
                ">
            @else
                <img src="{{asset('css/profile/'.Auth::user()->user_img)}}" s style="position: absolute;
                width: 91px;
                height: 75px;
                left: 800px;
                top: 40px;
                background-size: cover;
                border-radius: 5px;
                ">
            @endif


            <button style="position: absolute;
            width: 118px;
            height: 35px;
            left: 1000px;
            top:60px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;" onclick="document.location='Page8.html'">Edit info</button>
            
        </div>
        <div class="checkout-item1">
            <table id="productCheckout">
                @foreach ($purchases as $item)
                    @foreach ($item->item as $prod)
                        {{-- @if($prod->status != 'Completed')

                        @endif() --}}
                        <tr>
                            <td><img src="{{asset('css/Product/'.$prod->product->product_img)}}" style="width: 89px;
                                height: 75px; "></td>
                            <td><Label style="color:#474646;"></Label>{{$prod->product->name}}</Label></td>
                            <td  style="color:#474646;" >P{{$prod->size->price}}</td>
                            <td><Label style="color:#474646;"></Label>{{$prod->product_qty}}</Label></td>
                            <td  style="color:#474646;">P{{$prod->total_price}}</td>
                            <td><Label style="color:#474646;"></Label>{{$prod->status}}</Label></td>
                        </tr>
                    @endforeach
                @endforeach

            </table>
        </div>
    </div>
</div>


@endsection
