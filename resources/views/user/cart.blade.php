@extends('layouts.homeApp')

@section('content')

@include('inc.message')

<div class="container">
    <h2>Cart</h2>

    <form method="POST" action="">
        @csrf

    <div class="outer-border">
        <table>
            <tr>
                <th></th>
                <th></th>
                <th class="colspan">Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            {{-- <tr>
                <td><input type="checkbox" checked ></td>
                <td><img src="{{asset('css/Product/2.jpg')}}" style="width: 89px;
                    height: 75px; "></td>
                <td><Label style="color:#474646;"></Label>Lumber</Label></td>
                <td  style="color:#474646;" >P48</td>
                <td> <input placeholder="5" type="number"  step="3" style="width: 20%;"></td>
                <td  style="color:#474646;">P240</td>
                <td><a onMouseOver="this.style.color='red'"
                onMouseOut="this.style.color='#474646'"  
                href="url" style="text-decoration: none;
                color:#474646;">Delete</a></td>
            </tr> --}}

            @foreach ($carts as $cart)
                <tr>
                    <td><input type="checkbox" checked name="order[]" value="{{$cart->id}}" onchange="manageCart(this,{{$cart->total_price}})"></td>
                    <td><img src="{{asset('css/Product/'.$cart->product->product_img)}}" style="width: 89px;
                        height: 75px; "></td>
                    <td><Label style="color:#474646;"></Label>{{$cart->size->name}} {{$cart->product->name}}</Label></td>
                    <td  style="color:#474646;" >P{{$cart->size->price}}</td>
                    <td> <input placeholder="5" type="number"  step="3" style="width: 20%;" value="{{$cart->product_qty}}" disabled></td>
                    <td  style="color:#474646;">P{{$cart->total_price}}</td>
                    <td><a onMouseOver="this.style.color='red'"
                    onMouseOut="this.style.color='#474646'"  
                        href="url" style="text-decoration: none;
                        color:#474646;">Delete</a></td>
                </tr>
            @endforeach
        </table>

    </div>
    
    <button type="submit" class="checkout_placeorder" onclick="document.location='Page7.html'">Checkout</button>

    </form>

    <p class="totalprice">TOTAL: P<label id="totalPriceUI">{{$carts->sum('total_price')}}</label></p>
</div>

<div class="line"></div>

<script>
    function manageCart(checkbox,price) {
        var totalPrice = parseInt(document.getElementById("totalPriceUI").innerHTML);
        console.log(totalPrice)
        if(checkbox.checked == true){
            var updateTotal = totalPrice+price;
            document.getElementById("totalPriceUI").innerHTML = updateTotal
        }else{
            var updateTotal = totalPrice-price;
            document.getElementById("totalPriceUI").innerHTML = updateTotal
        }
    }
</script>

@endsection
