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
    
    <form action="{{route('product.search')}}" method="POST">
        @csrf
        <div  class="search">
            <input type="text" placeholder="Product Name" name="searchItem">
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
        border-style: none;" type="submit">Search</button>
    </form>


    <button class="print">Print</button>

    <button style="position: absolute;
    width: 131px;
    height: 46px;
    left: 840px;
    top: 150px;;
    color: white;
    border-style: none;
    background: #0077B6;
    border-radius: 5px;"
    id="myBtn">Add products</button>

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
                        <button onclick="document.location='{{ route('product.editpage', $product->id) }}'" style="
                        width: 87px;
                        height: 31px;
                        background-color: #0077B6;
                        color: white;
                        border-style: none;
                        border-radius: 5px;">Edit</button>
                        {{-- <button style="
                        width: 87px;
                        height: 31px;
                        background-color: rgba(182, 66, 0, 0.59);;
                        color: white;
                        border-style: none;
                        border-radius: 5px;">Delete</button> --}}

                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this Product?');"  
                            style="
                            width: 87px;
                            height: 31px;
                            background-color: rgba(182, 66, 0, 0.59);;
                            color: white;
                            border-style: none;
                            border-radius: 5px;">
                        </form>
                    </td>
                </tr>
            @endforeach
           
        </table>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <label style="
            height: 50px;
            left: 50px;
            top: 40px;
            border-radius: 3px;
            color: #0077B6;">Add products</label>

        <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Enter Product Photo</label>
                <input type="file" name="photo" class="form-control @error('photo') border-danger @enderror" required>
            </div>
            <div class="form-group mt-3">
                <label for="product_name">Enter Product Name</label>
                <input type="text" class="form-control @error('product_name') border-danger @enderror" id="product_name" placeholder="Product Name" name="product_name" required>
            </div>

            <div id="sizeInput">
                <div class="row sizeInputClass">
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
                            <input type="text" class="form-control @error('product_size') border-danger @enderror" id="product_size[]" placeholder="Product Size" name="product_size[]" required>
                        </div>        
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label for="product_price mt-3">Price</label>
                            <input type="number" class="mt-2 form-control @error('product_price') border-danger @enderror" id="product_price[]" placeholder="Price" name="product_price[]" required>
                        </div>        
                    </div>
                    <div class="col-4">
                        <div class="form-group mt-3">
                            <label for="product_stock">Stock</label>
                            <input type="number" class="mt-2 form-control @error('product_stock') border-danger @enderror" id="product_stock[]" placeholder="Product Stock" name="product_stock[]" required>
                        </div>        
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

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
