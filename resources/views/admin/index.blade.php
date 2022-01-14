@extends('layouts.adminapp')

@section('content')
<div class="products_requestorders-container">

    <label style="position: absolute;
    width: 109px;
    height: 36px;
    left: 50px;
    top: 20px;
    font-family: Poppins;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 36px;
    color: #474646;">Products</label>
    
    <div  class="search">
        <input type="text" placeholder="ID/Product Name"></input>
        <i class="fas fa-search search-icon"></i>
    </div>

    <button style="position: absolute;
    width: 87px;
    height: 31px;
    left: 300px;
    top: 115px;
    
    background: #0077B6;
    border-radius: 5px;
    color: white;
    border-style: none;">Search</button>
    <button class="print">Print</button>

    <button style="position: absolute;
    width: 131px;
    height: 46px;
    left: 840px;
    top: 150px;;
    color: white;
    border-style: none;
    background: #0077B6;
    border-radius: 5px;" onclick="document.location='AdminPage3.html'">Add products</button>

    <div class="outer-border">
        <table >
            <tr>
            
                <th>ID</th>
                <th class="colspan">Product Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>


            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        @foreach ($product->size as $item)
                            <label>{{$item->name}}</label>
                        @endforeach
                    </td>
                
                    <td>
                        @foreach ($product->size as $item)
                            <label>{{$item->price}}</label>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($product->size as $item)
                            <label>{{$item->qty}}</label>
                        @endforeach
                    </td>
                    <td>
                        <button style="
                        width: 87px;
                        height: 31px;
                        background-color: #0077B6;
                        color: white;
                        border-style: none;
                        border-radius: 5px;">Edit</button>
                        <button style="
                        width: 87px;
                        height: 31px;
                        background-color: rgba(182, 66, 0, 0.59);;
                        color: white;
                        border-style: none;
                        border-radius: 5px;">Delete</button>
                    </td>
                </tr>
            @endforeach
           
        </table>
    </div>
</div>
@endsection
