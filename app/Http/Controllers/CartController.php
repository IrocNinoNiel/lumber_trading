<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $carts = Cart::all();
        $carts = Cart::where('user_id',Auth::user()->id)->get();        
        return view('user.cart')->with('carts',$carts);
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        // echo $product;
        return view('user.addToCart')->with('product',$product)->with('id',$id);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'selectSize' => 'required',
            'customerQty' => 'required|numeric|min:1',
        ]);

        $size = Size::find($request->selectSize);

        $product_qty = $request->customerQty;
        $total_price = $product_qty * $size->price;
        $user_id = Auth::user()->id;
        $product_id = $request->productID;
        $product_size_id = $request->selectSize;

        $cart = new Cart;

        $cart->total_price = $total_price;
        $cart->product_qty = $product_qty;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->size_id = $product_size_id;

        $cart->save();


        return Redirect::route('cart.index')->with('success','Product Added');
    }

    public function checkOutUI()
    {
        $checkoutArray = session()->get('checkoutArray');
        $totalSum = session()->get('totalSum');

        if(!$checkoutArray || !$totalSum ){
            return Redirect::route('cart.index');
        }

        return view('user.checkout')->with('products',$checkoutArray)->with('totalSum',$totalSum);
    }

    public function toCheckout(Request $request)
    {
        $checkoutArray = [];
        $totalSum = 0;

        if(!$request->order){
            return Redirect::route('cart.index')->with('noproduct','Product is Deleted');
        }

        foreach($request->order as $ids){
            $checkout = Cart::find($ids);
            array_push($checkoutArray,$checkout);
            $totalSum += $checkout->total_price;
        }
        
        return redirect()->route( 'cart.tocheckoutui' )->with( ['checkoutArray' => $checkoutArray,'totalSum' =>$totalSum] );
    }

    public function destroy($id){
        $cart = Cart::find($id);
        if(is_null($cart)) abort(404);

        $cart->delete();
        // return Redirect::route('cart.index')->with('deleted','Product is Deleted');
    }
}
