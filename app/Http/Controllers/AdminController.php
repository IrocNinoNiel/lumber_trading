<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Size;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order(){
        $items = Item::all();
        return view('admin.order')->with('items',$items);
    }

    public function processing(){
        $items = Item::all();
        return view('admin.processing')->with('items',$items);
    }

    public function deliver(){
        $items = Item::all();
        return view('admin.deliver')->with('items',$items);
    }

    public function pickup(){
        $items = Item::all();
        return view('admin.pickup')->with('items',$items);
    }

    public function complete(){
        $items = Item::all();
        return view('admin.completed')->with('items',$items);
    }

    public function reject($id){
        $items = Item::find($id);
        if(is_null($items)) abort(404);

        $items->status = 'Rejected';
        $items->save();

        $size = Size::find($items->size->id);
        $size->qty = $size->qty + $items->product_qty;
        $size->save();

        return Redirect::route('admin.order');
    }

    public function accept($id){
        $items = Item::find($id);
        if(is_null($items)) abort(404);

        $items->status = 'Processing';
        $items->save();

        return Redirect::route('admin.order');
    }

    public function done_process($id){
        $items = Item::find($id);
        if(is_null($items)) abort(404);

        if($items->purchase->checkout_id == 1){
            $items->status = 'Deliver';
        }else if($items->purchase->checkout_id == 2){
            $items->status = 'Pickup';
        }
        $items->save();

        return Redirect::route('admin.processing');
    }

    public function completed($id){
        $items = Item::find($id);
        if(is_null($items)) abort(404);

        $items->status = 'Completed';
        $items->save();

        return Redirect::route('admin.order');
    }
}
