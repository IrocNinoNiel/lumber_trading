@extends('layouts.homeApp')

@section('content')

@include('inc.message')

<div class="container">
    <h2>Cart</h2>

    <form method="POST" action="{{ route('cart.tocheckout') }}">
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
                @if(count($carts) != 0)
                    @foreach ($carts as $cart)
                        @if ($cart->status == 0)
                            <tr>
                                <td><input type="checkbox" checked name="order[]" value="{{$cart->id}}" onchange="manageCart(this,{{$cart->total_price}})"></td>
                                <td><img src="{{asset('css/Product/'.$cart->product->product_img)}}" style="width: 89px;
                                    height: 75px; "></td>
                                <td><Label style="color:#474646;"></Label>{{$cart->size->name}} {{$cart->product->name}}</Label></td>
                                <td  style="color:#474646;" >P{{$cart->size->price}}</td>
                                <td> <input placeholder="5" type="number"  step="3" style="width: 20%;" value="{{$cart->product_qty}}" disabled></td>
                                <td  style="color:#474646;">P{{$cart->total_price}}</td>
                                <td>
                                    <button class="btn" onMouseOver="this.style.color='red'"
                                    onMouseOut="this.style.color='#474646'"  
                                        style="text-decoration: none;
                                        color:#474646;" onclick="deleteItem({{$cart->id}})">Delete</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </table>
        </div>
        <button type="submit" class="checkout_placeorder">Checkout</button>
    </form>

    <p class="totalprice">TOTAL: P<label id="totalPriceUI">{{$carts->where('status', 0)->sum('total_price')}}</label></p>
</div>

<div class="line"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
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

    function deleteItem(id){
        console.log(id);
        var url = "http://127.0.0.1:8000/user/cart/delete/"+id;

        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({
            type: "DELETE",
            url: url,
            success:function(data){
                location.reload();
            },
            error:function(error){
                location.reload();
            }
        })
    }
</script>

@endsection
