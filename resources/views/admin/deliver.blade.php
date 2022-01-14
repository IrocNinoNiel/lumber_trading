@extends('layouts.adminapp')

@section('content')
<div class="products_requestorders-container">
    <label style="position: absolute;
    width: 209px;
    height: 36px;
    left: 50px;
    top: 20px;
    font-family: Poppins;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 36px;
    color: #474646;">Request Orders</label>
    <button class="print">Print</button>
    <ul>
        <li><a href="{{ route('admin.order') }}">Orders</a></li>
        <li><a href="{{ route('admin.processing') }}">Processing</a></li>
        <li><a class="active2"  href="{{ route('admin.deliver') }}">To Deliver</a></li>
        <li><a href="{{ route('admin.pickup') }}">To Pickup</a></li>
        <li><a href="{{ route('admin.complete') }}">Completed</a></li>
      </ul> 

    <div class="outer-border">
        <table >
            <tr>
                <th> Order ID</th>
            <th></th>
            <th >Customer Details</th>
            <th></th>
            <th>Product(s) Ordered</th>
            <th>Payment Method</th>
            <th>Action</th>
            </tr>

            @foreach ($items as $item)
                @if ($item->status == 'Deliver')
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        @if($item->purchase->user->user_img == '')
                            <img src="{{asset('css/profile/anon.jpg')}}" style="
                            width: 74px;
                            height: 70px;
                            background-size: cover; "> 
                        @else
                            <img src="{{asset('css/profile/'.$item->purchase->user->user_img)}}" style="
                            width: 74px;
                            height: 70px;
                            background-size: cover; "> 
                        @endif   
                        
                    </td>
                    <td>
                        <label>
                            {{$item->purchase->user->name}}
                        </label>
                        <label>
                            ({{$item->purchase->user->contact_number}})
                        </label>
                        <label>
                            {{$item->purchase->user->address}}
                        </label>
                    </td>
                    
                    <td>
                        @if($item->product->product_img == '')
                            <img src="{{asset('css/profile/anon.jpg')}}" style="
                            width: 74px;
                            height: 70px;
                            background-size: cover; "> 
                        @else
                            <img src="{{asset('css/product/'.$item->product->product_img)}}" style="
                            width: 74px;
                            height: 70px;
                            background-size: cover; "> 
                        @endif  
                    </td>
                    <td>
                    <label>
                        {{$item->product->name}}
                    </label>
                    <label>
                        {{$item->size->price}}
                    </label>
                    <label>
                        Size:{{$item->size->name}}
                    </label>
                    <label>
                        Qty:{{$item->product_qty}}
                    </label>
                    <label>
                        Total:{{$item->total_price}}
                    </label>
                    </td>

                    <td>
                        @if ($item->purchase->payment_method_id == 1)
                            <label>
                                GCASH
                            </label>
                        @else
                            <label>
                                Cash On Pickup
                            </label>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('admin.completed', $item->id) }}" method="post">
                            @csrf
                            <input type="submit" style="
                            width: 80px;
                            height: 31px;
                            background-color: #0077B6;
                            color: white;
                            border-style: none;
                            border-radius: 5px;" value="Deliver" onclick="return confirm('Done Deliver??');">
                        </form>
                        <br>
                    </td>
                </tr>
                 
                @endif
            @endforeach        
        </table>

    </div>

</div>
        
@endsection
