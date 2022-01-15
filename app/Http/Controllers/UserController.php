<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function profile($id)
    {
        $user = User::find($id);
        if(is_null($user)) abort(404);

        if(Auth::user()->id != $user->id) abort(403);

        return view('user.profile')->with('user',$user);
    }

    public function imageUploadPost(Request $request,$id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('/css/profile'), $imageName);

        $user = User::find($id);
        $user->user_img = $imageName;
        
        $user->save();
        
        return Redirect::route('profile.index',$id);
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName); 
    }

    public function editBasicInfo(Request $request, $id){

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255' ,Rule::unique('users')->ignore($id)],
            'username' => ['required', 'string','max:255',Rule::unique('users')->ignore($id)],
            'contact_number' => ['required', 'string', 'min:11'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        print_r($request->all());

        $user = User::find($id);
        if(is_null($user)) abort(404);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->contact_number = $request->contact_number;
        $user->address = $request->address;

        $user->save();

        return Redirect::route('profile.index',$id);
    }  

    public function changePassword(Request $request, $id){

        $user = User::find($id);
        if(is_null($user)) abort(404);

        $this->validate($request, [
            'oldpassword' => ['required', 'string', 'min:8',],
            'newpassword' => ['required', 'string', 'min:8',],
            'newpassword1' => ['required', 'string', 'min:8',],
        ]);

        $checkOldPassword = Hash::check($request->oldpassword, Auth::user()->password);

        if(!$checkOldPassword){
            return back()->with('incorrect','Password is incorrect');
        }

        if($request->newpassword != $request->newpassword1){
            return back()->with('notmatch','Password Dont Match');
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return Redirect::route('profile.index',$id)->with('successpass','Password Change Succesfully');
    }

    public function destroy($id){
        $user = User::find($id);
        if(is_null($user)) abort(404);

        $user->delete();
        
        Auth::logout();
        // Session::flush();
        return Redirect::to('/');
    }
}
