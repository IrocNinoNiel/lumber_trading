<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addproduct(Request $request){


        $this->validate($request,[
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            'product_size' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('css/product'), $imageName);

        $product = new Product;
    
        $product->name = $request->product_name;
        $product->product_img = $imageName;

        $product->save();

        for ($i=0; $i < count($request->product_size); $i++) { 
            $size = new Size;

            $size->name = $request->product_size[$i];
            $size->price = $request->product_price[$i];
            $size->qty = $request->product_stock[$i];
            $size->product_id = $product->id;

            $size->save();
        }

        return Redirect::route('home');
    }

    public function edit(Request $request,$id){


        $this->validate($request,[
            'product_name' => 'required',
            'product_size' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
        ]);


        $product = Product::find($id);
        $imageName = $product->product_img;

        if($request->photo){
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('css/product'), $imageName);
            $product->product_img = $imageName;
        }

        $product->name = $request->product_name;

        $product->save();

        Size::where('product_id',$id)->delete();

        for ($i=0; $i < count($request->product_size); $i++) { 
            $size = new Size;

            $size->name = $request->product_size[$i];
            $size->price = $request->product_price[$i];
            $size->qty = $request->product_stock[$i];
            $size->product_id = $product->id;

            $size->save();
        }

        return Redirect::route('home');
    }

    public function editPage($id){
        $product = Product::find($id);
        if(is_null($product)) abort(404);

        return view('admin.edit')->with('product',$product);
    }

    public function search(Request $request){
        if(!$request->searchItem || $request->searchItem == ''){
            $products = Product::all();
            return view('admin.index')->with('products',$products);
        }else{
            $products = Product::where('name','LIKE','%'.$request->searchItem.'%')->get();
            return view('admin.index')->with('products',$products);
        }
    }

    public function searchItem(Request $request){

        $arrayOverlay = array(
            [
                'name'=>'lumber',
                'overlay-name'=>'overlay-lumber'
            ],
            [
                'name'=>'plywood',
                'overlay-name'=>'overlay-plywood'
            ],
            [
                'name'=>'steelbars',
                'overlay-name'=>'overlay-steelbars'
            ],
            [
                'name'=>'nails',
                'overlay-name'=>'overlay-nail'
            ],
            [
                'name'=>'sawdust',
                'overlay-name'=>'overlay-sawdust'
            ],
            [
                'name'=>'doorknob',
                'overlay-name'=>'overlay-doorknob'
            ],
            [
                'name'=>'padlock',
                'overlay-name'=>'overlay-padlock'
            ],
            [
                'name'=>'rod',
                'overlay-name'=>'overlay-rod'
            ],
            [
                'name'=>'sandpaper',
                'overlay-name'=>'overlay-sandpaper'
            ],
            [
                'name'=>'wire',
                'overlay-name'=>'overlay-wire'
            ],
            [
                'name'=>'roof',
                'overlay-name'=>'overlay-roof'
            ],
        );

        // print_r($request->searchItem);

        if(!$request->searchItem || $request->searchItem == ''){
            $products = Product::all();
            return view('homepage')->with('products',$products)->with('arrayOverlay',$arrayOverlay);
        }else{
            $products = Product::where('name','LIKE','%'.$request->searchItem.'%')->get();
            return view('homepage')->with('products',$products)->with('arrayOverlay',$arrayOverlay);
        }
    }


    public function destroy($id){
        $product = Product::find($id);
        if(is_null($product)) abort(404);

        $product->delete();
        
        return Redirect::route('home');
    }
}
