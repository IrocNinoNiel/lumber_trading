@extends('layouts.homeApp')

@section('content')


    <div class="container">
        <h2>{{$product->name}}</h2>

        <div style="position: absolute;
        width: 177px;
        height: 141px;
        left: 500px;
        top:70px;
            border-radius: 5px;
            border-style: none;
            background-image: url(/css/Product/{{$product->product_img}});
            background-size: cover;">
           
        </div>

        @if(count($product->size) > 1)
            <label class="price" id="priceTag">P{{$product->size[0]->price}} - P{{$product->size[count($product->size)-1]->price}}</label>
        @else
            <label class="price" id="priceTag">P{{$product->size[0]->price}}</label>
        @endif
        <label class="size">Size</label>
        <label class="stock">Stock</label>
        <label class="quantity">Quantity</label>
        <label class="stock-num">{{$product->size[0]->qty}}</label>
        
        <form method="POST" action="{{ route('cart.store',$id) }}">
            @csrf
            <select class="select-size @error('selectSize') is-invalid @enderror" id="selectSize" onchange="getValue({{$product->size}})" name="selectSize" value="{{ old('selectSize') }}" required>
                @foreach ($product->size as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>

            <input placeholder="0" type="number" class="quantity-select @error('customerQty') is-invalid @enderror" step="1" id="customerQty" name="customerQty" value="{{ old('customerQty') }}" required>
            <input type="hidden" id="custId" name="productID" value={{$id}}>

            <button type="submit" class="add-cart">Add to cart</button>

        </form>
          <button class="back" onclick="document.location='{{ route('home') }}'">Back</button>

    </div>



<script>
    function getValue(items){
        var getSelect = document.getElementById("selectSize");
        var getId = getSelect.options[getSelect.selectedIndex].value;

        var sizeInfo = items.filter(item => item.id == getId)

        document.getElementById("priceTag").innerHTML = `P${sizeInfo[0].price}`

        console.log(document.getElementById("priceTag"));
    }
</script>
@endsection
