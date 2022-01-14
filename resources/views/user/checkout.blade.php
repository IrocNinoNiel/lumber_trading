@extends('layouts.homeApp')

@section('content')
<div class="container">
    <h2>Checkout</h2>

        
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
            top: 90px;">Jane Doe</label>


            <button style="position: absolute;
            width: 118px;
            height: 35px;
            left: 1000px;
            top:60px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;" onclick="document.location='Page8.html'">Add info</button>
            
        </div>

        <div class="checkout-item">

        
            <label style="position: absolute;
            width: 94px;
            height: 36px;
            top: 15px;
            left: 260px;
            font-size: 20px;
            line-height: 36px;
            color:#0077B6">Product</label>

            <label style="position: absolute;
            width: 111px;
            height: 36px;
            left: 410px;
            top: 15px;
            font-size: 20px;
            line-height: 36px;
            color: #0077B6">Unit Price</label>

            <label style="position: absolute;
            width: 111px;
            height: 36px;
            left: 560px;
            top: 15px;
            font-size: 20px;
            line-height: 36px;
            color:#0077B6">Quantity</label>


            <label style="position: absolute;
            width: 111px;
            height: 36px;
            left: 950px;
            top: 15px;
            font-size: 20px;
            line-height: 36px;
            color:#0077B6">Total</label>

            <label style="position: absolute;
            width: 111px;
            height: 36px;
            left: 1070px;
            top: 15px;
            font-size: 18px;
            line-height: 36px;
            color:#0077B6">Action</label>


            <table>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{asset('css/Product/'.$product->product->product_img)}}" style="width: 89px;
                            height: 75px; "></td>
                        <td><Label style="color:#474646;">{{$product->size->name}} {{$product->product->name}}</Label></td>
                        <td  style="color:#474646;" >P{{$product->size->price}}</td>
                        <td> <input placeholder="5" type="number"  step="3" style="width: 20%;" disabled value="{{$product->product_qty}}"></td>
                        <td  style="color:#474646;">P{{$product->total_price}}</td>
                        <td><a onMouseOver="this.style.color='red'"
                        onMouseOut="this.style.color='#474646'"  
                        href="url" style="text-decoration: none;
                        color:#474646;">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="payment">

            <label style="position: absolute;
            width: 194px;
            height: 36px;
            left: 70px;
            top: 15px;
            font-size: 18px;
            line-height: 36px;
            color:#0077B6">Delivery Option</label>

            <label style="position: absolute;
            width: 194px;
            height: 36px;
            left: 506px;
            top: 15px;
            font-size: 18px;
            line-height: 36px;
            color:#0077B6">Payment Method</label>

            <label style="position: absolute;
            width: 194px;
            height: 36px;
            left: 920px;
            top: 15px;
            font-size: 18px;
            line-height: 36px;
            color:#474646;">GCASH: 0912345678</label>

            <input type="radio" style="    
            position: absolute;
            width: 20px;
            height: 20px;
            left: 70px;
            top: 130px;">

            <label style="position: absolute;
            width: 61px;
            height: 27px;
            left: 110px;
            top: 130px;">Deliver</label>

            <input type="radio" style="    
            position: absolute;
            width: 20px;
            height: 20px;
            left: 180px;
            top: 130px;">

            <label style="position: absolute;
            width: 61px;
            height: 27px;
            left: 220px;
            top: 130px;">Pickup</label>

            
            <input type="radio" style="    
            position: absolute;
            width: 20px;
            height: 20px;
            left: 506px;;
            top: 130px;">

            <label style="position: absolute;
            width: 61px;
            height: 27px;
            left: 540px;
            top: 130px;">Gcash</label>

            <input type="radio" style="    
            position: absolute;
            width: 20px;
            height: 20px;
            left: 600px;;
            top: 130px;">

            <label style="position: absolute;
            width: 139px;
            height: 27px;
            left: 630px;
            top: 130px;">Cash on Pickup</label>


            <button style="position: absolute;
            width: 141px;
            height: 40px;
            left: 600px;
            top: 170px;
            background: #0077B6;
            border-radius: 5px;
            border-style: none;
            color: white;">Upload a Receipt</button>
                        
        </div>
    </div>
        
    <button class="checkout_placeorder">Place Order</button>
    <label class="totalprice">TOTAL: P240</label>
</div>
@endsection
