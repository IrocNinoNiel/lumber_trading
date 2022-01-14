<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Cart;
use App\Models\Purchase;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $purchases = Purchase::all();
        return view('user.purchase')->with('purchases',$purchases);
    }

    public function store(Request $request)
    {
        if(request()->ajax()){

            $imageName = '';

            // if($request->pay_option == 1){
            //     $imageName = time().'.'.$request->gcashpic->extension();  
            //     $request->gcashpic->move(public_path('images'), $imageName);
            // }

            $purchase = new Purchase;

            $date = new DateTime();
            $purchase->date = $date;
            $purchase->status = 'pending';
            $purchase->image = $imageName;
            $purchase->user_id = Auth::user()->id;
            $purchase->checkout_id = $request->del_option;
            $purchase->payment_method_id = $request->pay_option;

            $purchase->save();

            foreach($request->product_id as $id){
                $cart = Cart::find($id);

                $item = new Item;
                $item->total_price = $cart->total_price;
                $item->product_qty = $cart->product_qty;
                $item->purchase_id = $purchase->id;
                $item->product_id = $cart->product_id;
                $item->size_id = $cart->size_id;

                $item->save();
            }

            return response()->json(['msg'=>$request->all(), 'success'=>true]);  

        }

        // $this->validate($request,[
        //     'del_option' => 'required',
        //     'pay_option' => 'required',
        //     'product_id' => 'required'
        // ]);

        // $purchase = new Purchase;

        // $date = new DateTime();
        // $purchase->date = $date;
        // $purchase->status = 'pending';
        // $purchase->image = '';
        // $purchase->user_id = Auth::user()->id;
        // $purchase->checkout_id = $request->del_option;
        // $purchase->payment_method_id = $request->pay_option;

        // $purchase->save();

        // foreach($request->product_id as $id){
        //     $cart = Cart::find($id);

        //     $item = new Item;
        //     $item->total_price = $cart->total_price;
        //     $item->product_qty = $cart->product_qty;
        //     $item->purchase_id = $purchase->id;
        //     $item->product_id = $cart->product_id;
        //     $item->size_id = $cart->size_id;

        //     $item->save();
        // }

        // return redirect()->route('purchase.index');
    }
}
