@extends('layouts.homeApp')

@section('content')

<div class="container">
    <h2>Products</h2>

    @foreach ($products as $product)
        <div class="{{$product->name}}" >
            <div class="overlay-{{$product->name}}">
                <button onclick="document.location='{{ route('cart.addcart',$product->id) }}'">{{$product->name}}</button>
            </div>
        </div>
    @endforeach
    {{-- <div class="lumber" >
        <div class="overlay-lumber">
            <button onclick="document.location='Page2.html'">Lumber</button>
        </div>
    </div> --}}

    {{-- <div class="plywood" >
        <div class="overlay-plywood">
            <button>Plywood</button>
        </div>
    </div> --}}

    <div class="steelbars" >
        <div class="overlay-steelbars">
            <button>Steel Bars</button>
        </div>
    </div>
    
    
    <div class="nails" >
        <div class="overlay-nails">
            <button>Nails</button>
        </div>
    </div>
    
         
    <div class="amakan" >
        <div class="overlay-amakan">
            <button>Amakan</button>
        </div>
    </div>


        
    <div class="sawdust" >
        <div class="overlay-sawdust">
            <button>Saw Dust</button>
        </div>
    </div>
    
    <div class="doorknob" >
        <div class="overlay-doorknob">
            <button>Door Knob</button>
        </div>
    </div>
    

    <div class="padlock" >
        <div class="overlay-padlock">
            <button>Pad Lock</button>
        </div>
    </div>
     
    <div class="rod" >
        <div class="overlay-rod">
            <button>Weilding Rod</button>
        </div>
    </div>

    <div class="sandpaper" >
        <div class="overlay-sandpaper">
            <button>Sand Paper</button>
        </div>
    </div>

    <div class="wire" >
        <div class="overlay-wire">
            <button>Tie Wire</button>
        </div>
    </div>
      
    <div class="roof" >
        <div class="overlay-roof">
            <button>Metal Roof</button>
        </div>
    </div>
    
</div>
@endsection
