@extends('layouts.homeApp')

@section('content')
<div class="container">
    <h2>My Purchases</h2>

 <div class="outer-border">
     
    <div class="purchase-item">

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

        <label style="position: absolute;
        font-size: 14;
        left: 150px;
        top: 90px;">(+963 904 484 9494)</label>

        <label style="position: absolute;
        font-size: 14;
        left: 400px;
        top: 90px;">  090, Zone1, Carmen, Cagayan  De Oro City</label>


            <img src="{{asset('css/download.jpg')}}" style="position: absolute;
            width: 91px;
            height: 75px;
            left: 800px;
            top: 40px;
            background-size: cover;
            border-radius: 5px;
            ">


        <button style="position: absolute;
        width: 118px;
        height: 35px;
        left: 1000px;
        top:60px;
        background-color: #0077B6;
        color: white;
        border-style: none;
        border-radius: 5px;" onclick="document.location='Page8.html'">Edit info</button>
        
   
        
        <img src="{{asset('css/Product/2.jpg')}}" style="position: absolute;
        width: 89px;
        height: 75px;
        left: 100px;
        top: 160px; ">


        <label style="position: absolute;
        width: 88px;
        height: 19px;
        left: 200px;
        top: 190px;
        line-height: 27px;
        color: #474646;">Lumber</label>


        <label style="position: absolute;
        width: 88px;
        height: 19px;
        left: 430px;
        top: 190px;
        line-height: 27px;
        color: #474646;">P48</label>

        <label style="position: absolute;
        width: 88px;
        height: 19px;
        left: 640px;
        top: 190px;
        line-height: 27px;
        color: #474646;">5x</label>

        <label style="position: absolute;
        width: 88px;
        height: 19px;
        left: 800px;
        top: 190px;
        line-height: 27px;
        color: #474646;">Total: P240</label>

        <label style="position: absolute;
       width: 139px;
        height: 19px;
        left: 1000px;
        top: 190px;
        line-height: 27px;
        color: #474646;">Status: Pending</label>


    </div>
    
 </div>
    
</div>

<div class="line"></div>
@endsection
