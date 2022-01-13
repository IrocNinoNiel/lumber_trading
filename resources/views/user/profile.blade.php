@extends('layouts.homeApp')

@section('content')
<div class="container">
    <h2>My Account</h2>

    
     
    <div class="account-info">

        <div class="profile">
            @if (Auth::user()->user_img == '')
                <img src="{{asset('css/profile/anon.jpg')}}" style="position: absolute;
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    top: 20px;
                    left: 35px;
                    background-size: cover;
                    border-radius: 5px;
                ">
            @else
                <img src="{{asset('css/profile/anon.jpg')}}" style="position: absolute;
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    top: 20px;
                    left: 35px;
                    background-size: cover;
                    border-radius: 5px;
                ">
            @endif
        </div>
        <label
        style="position: absolute;
        width: 120px;
        height: 21px;
        left: 230px;
        top: 150px;
        color: white;">{{ Auth::user()->name }}</label>


        <button style="position: absolute;
        width: 118px;
        height: 35px;
        left: 400px;
        top:150px;
        background-color: white;
        color: #474646;
        border-style: none;
        border-radius: 5px;">Upload photo</button>


        <div class="user-details">

            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left:40px;
            top: 15px;">User Name</label>

            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left: 40px;
            top: 45px;
            font-weight: bold;
            font-size: 16px;
            ">{{ Auth::user()->username }}</label>

            <label
            style="position: absolute;
            width: 170px;
            height: 21px;
            left:40px;
            top: 100px;">Contact Number</label>


            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left: 40px;
            top: 125px;
            font-weight: bold;
            font-size: 16px;
            ">{{ Auth::user()->contact_number }}</label>

            <button style="position: absolute;
            width: 110px;
            height: 30px;
            left: 300px;
            top:45px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;">Edit</button>


            <button style="position: absolute;
            width: 110px;
            height: 30px;
            left: 300px;
            top:125px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;">Edit</button>

        </div>

        <button style="position: absolute;
        width: 130px;
        height: 35px;
        left: 1000px;
        top:60px;
        background-color: #0077B6;
        color: white;
        border-style: none;
        border-radius: 5px;" >Valid ID Update</button>

        <img src="{{asset('css/download.jpg')}}" style="position: absolute;
        width: 120px;
        height:120px;
        left: 800px;
        top: 40px;
        background-size: cover;
        border-radius: 5px;
        ">

        <button style="position: absolute;
        width: 150px;
        height: 35px;
        left:650px;
        top:400px;
        background-color: #0077B6;
        color: white;
        border-style: none;
        border-radius: 5px;" >Change password</button>

        <button style="position: absolute;
        width: 150px;
        height: 35px;
        left:1000px;
        top:400px;
        background-color: white;
        border: 1px solid #2A2828;;
        border-radius: 5px;" >Delete account</button>

    </div>


</div>
@endsection
