<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $products = Product::all();
        if(auth()->user()){
            if(auth()->user()->user_type_id == 1){
                return view('admin.index')->with('products',$products);
            }else{
                return view('homepage')->with('products',$products);
            }
        }else{
            return view('homepage')->with('products',$products);
        }
    }
}
