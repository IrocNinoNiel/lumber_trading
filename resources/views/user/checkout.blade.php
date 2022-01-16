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


            {{-- <button style="position: absolute;
            width: 118px;
            height: 35px;
            left: 1000px;
            top:60px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;">Edit info</button> --}}

            {{-- onclick="document.location='Page8.html'" --}}
            
        </div>

        <form id="checkoutForm">
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
                @if ($products)
                <table id="productCheckout">
                    @foreach ($products as $product)
                        <tr id="{{$product->id}}">
                            <td><img src="{{asset('css/Product/'.$product->product->product_img)}}" style="width: 89px;
                                height: 75px; "></td>
                            <td><Label style="color:#474646;">{{$product->size->name}} {{$product->product->name}}</Label></td>
                            <td  style="color:#474646;" >P{{$product->size->price}}</td>
                            <td> <input placeholder="5" type="number"  step="3" style="width: 20%;" disabled value="{{$product->product_qty}}"></td>
                            <td  style="color:#474646;">P{{$product->total_price}}</td>
                            <td><a  onMouseOver="this.style.color='red'"
                            onMouseOut="this.style.color='#474646'"  
                            style="text-decoration: none;
                            color:#474646;" onclick="deleteOnCheckOut({{$product->id}}, {{$product->total_price}})">Delete</a></td>
                            <input type="hidden" name="product_id[]" value="{{$product->id}}">
                        </tr>
                    @endforeach
                </table>
                @endif
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
                top: 130px;"
                name="del_option"
                value=1>
    
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
                top: 130px;"
                name="del_option"
                value=2>
    
                <label style="position: absolute;
                width: 61px;
                height: 27px;
                left: 220px;
                top: 130px;">Pickup</label>
    
                
                <input type="radio" style="    
                position: absolute;
                width: 20px;
                height: 20px;
                left: 506px;
                top: 130px;"
                name="pay_option"
                value=1
                id="gcash">
    
                <label style="position: absolute;
                width: 61px;
                height: 27px;
                left: 540px;
                top: 130px;">Gcash</label>
    
                <input type="radio" style="    
                position: absolute;
                width: 20px;
                height: 20px;
                left: 600px;
                top: 130px;"
                name="pay_option"
                value=2>
    
                <label style="position: absolute;
                width: 139px;
                height: 27px;
                left: 630px;
                top: 130px;">Cash on Pickup</label>
    
{{--     
                <button style="position: absolute;
                width: 141px;
                height: 40px;
                left: 600px;
                top: 170px;
                background: #0077B6;
                border-radius: 5px;
                border-style: none;
                color: white;">Upload a Receipt</button> --}}

                {{-- <input type="file"
                id="gcashAvatar" 
                name="gcashAvatar"
                style="position: absolute;
                width: 141px;
                height: 40px;
                left: 600px;
                top: 170px;
                display:none;
                "> --}}
                            
            </div>

        </div>
    
        <button type="submit" class="checkout_placeorder" id="submitCheckout">Place Order</button>
    </form>
    <p class="totalprice">TOTAL: P<label id="totalPriceCheckout">{{$totalSum}}</label></p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script>

    function deleteOnCheckOut(id,price){
        $(`table#productCheckout tr#${id}`).remove();
        var totalPrice = parseInt(document.getElementById("totalPriceCheckout").innerHTML);
        var updateTotal = totalPrice-price;
        document.getElementById("totalPriceCheckout").innerHTML = updateTotal
    }

    // $('input[name="pay_option"]').click(function() {
    //     var payOpts = $('input[name="pay_option"]:checked').val();
    //     console.log(payOpts)
    //     if(payOpts == 1){
    //         $('#gcashAvatar').show();
    //     }else{
    //         $('#gcashAvatar').hide();
    //     }
    // })

    $("#submitCheckout").click(function(e){

        e.preventDefault();
        var delOpts = $('input[name="del_option"]:checked').val();
        var payOpts = $('input[name="pay_option"]:checked').val();

        if(!delOpts || !payOpts){
            alert('Please Choose Payment and Delivery Option');
        }else{

            var url = "/user/purchase";
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: $("#checkoutForm").serialize(),
                success:function(data)
                {
                    if(!data.success){
                        alert('Something is Wrong');
                    }
                    else{
                        alert('Succesfully purchase the item');
                        window.location.href = '/user/purchase';
                    }
                },
                error:function(error)
                {
                    console.log(error)
                    alert("Server Error");
                    console.log(error.responseText)
                }
            })   
        }
    });
</script>

@endsection
