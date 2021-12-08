<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class HomeController extends Controller
{
    //
    public function index(){
        
        return view('user.home');
    }

     public function changePassword()
    {
        return view('user.change.password');
    }

    /**
     * Login the user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePasswordPost(Request $request)
    {
        if( Hash::check($request->password, auth()->user()->password)) {

     }
         $request->validate([

        //'current_password' => ['required', new MatchOldPassword],
        'password' => ['required'],
        'confirm_password' => ['same:password'],
    ]);
    
    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
   
    //dd('Password change successfully.');
        //$user->update();
         return view('User.edit',);
        // / return redirect()->route('user.home')->withSuccess('Update success !!!');
       
}
    public function edit(Request $request)

{
    $user = Auth::user();
    //$user = User::where('id',$user_id)->first();
    return view('User.edit',compact('user'));

}
   public function update(Request $request)

{
    $user = Auth::user();

    //$user = User::where('id',$user_id)->first();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->phone_number = $request->phone;
    
    
        
        $user->update();
        // return view('edit_profile',compact('user'));
        return redirect()->route('user.home')->withSuccess('Update success !!!');
       
}
}