@extends('layouts.adminapp')

@section('content')

@include('inc.message')

<div class="products_requestorders-container container">

    <label style="
            height: 50px;
            left: 50px;
            top: 40px;
            border-radius: 3px;
            color: #0077B6;">Edit products</label>

        <form action="{{ route('product.edit',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Enter Product Photo</label>
                <input type="file" name="photo" class="form-control @error('photo') border-danger @enderror">
            </div>
            <div class="form-group mt-3">
                <label for="product_name">Enter Product Name</label>
                <input type="text" class="form-control @error('product_name') border-danger @enderror" id="product_name" placeholder="Product Name" value="{{$product->name}}" name="product_name" required>
            </div>

            <div id="sizeInput">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label for="product_size">
                                <div class="row">
                                    <div class="col-6">
                                        Add Size
                                    </div>
                                    <div class="col-2">
                                        <button style="
                                            background: #fff;
                                            border-style: none;
                                            height: 10px;
                                            color:#000;
                                            box-sizing: border-box;
                                            border-radius: 5px;" 
                                            type="button"
                                            onclick="addFields()">+</button>
                                    </div>
                                    <div class="col-2">
                                        <button style="
                                            background: #fff;
                                            border-style: none;
                                            height: 10px;
                                            color:#000;
                                            box-sizing: border-box;
                                            border-radius: 5px;" 
                                            type="button"
                                            onclick="deleteFields()">-</button>
                                    </div>
                                </div>
                            </label>
                        </div>        
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label for="product_price mt-3">Price</label>
                        </div>        
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label for="product_stock">Stock</label>
                        </div>        
                    </div>
                </div>

                @foreach ($product->size as $item)
                    <div class="row mt-3 sizeInputClass">
                        <div class="col-4">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" id="product_size[]" placeholder="Product Name" name="product_size[]" value="{{$item->name}}" required>
                            </div>        
                        </div>
                        <div class="col-4">
                            <div class="form-group mt-3">
                                <input type="number" class="mt-2 form-control " id="product_price[]" placeholder="Price" name="product_price[]" value="{{$item->price}}" required>
                            </div>        
                        </div>
                        <div class="col-4">
                            <div class="form-group mt-3">
                                <input type="number" class="mt-2 form-control" id="product_stock[]" placeholder="Product Stock" name="product_stock[]" value="{{$item->qty}}" required>
                            </div>        
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script>
    function addFields(){

        let output = 
            `<div class="row mt-3 sizeInputClass">
                <div class="col-4">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" id="product_size[]" placeholder="Product Name" name="product_size[]" required>
                    </div>        
                </div>
                <div class="col-4">
                    <div class="form-group mt-3">
                        <input type="number" class="mt-2 form-control " id="product_price[]" placeholder="Price" name="product_price[]" required>
                    </div>        
                </div>
                <div class="col-4">
                    <div class="form-group mt-3">
                        <input type="number" class="mt-2 form-control" id="product_stock[]" placeholder="Product Stock" name="product_stock[]" required>
                    </div>        
                </div>
            </div>`;

        $('#sizeInput').append(output);

    }

    function deleteFields(){
        var sizeList = document.getElementsByClassName('sizeInputClass');

        if(sizeList.length > 1){
            sizeList[sizeList.length-1].parentNode.removeChild(sizeList[sizeList.length-1])
        }
    }
</script>

@endsection
