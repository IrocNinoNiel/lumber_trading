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

        // print_r($arrayOverlay[0]['name']);

        $products = Product::all();
        if(auth()->user()){
            if(auth()->user()->user_type_id == 1){
                return view('admin.index')->with('products',$products);
            }else{
                return view('homepage')->with('products',$products)->with('arrayOverlay',$arrayOverlay);
            }
        }else{
            return view('homepage')->with('products',$products)->with('arrayOverlay',$arrayOverlay);
        }
    }
}
