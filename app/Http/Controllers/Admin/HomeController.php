<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class HomeController extends Controller
{
    //
    public function index(){
        
        return view('admin.home');
    }

     public function changePassword()
    {
        return view('admin.change.password');
    }

    /**
     * Login the user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePasswordPost(Request $request)
    { $request->validate([
        'current_password' => ['required', new MatchOldPassword],
        'password' => ['required'],
        'confirm_password' => ['same:password'],
    ]);
    
    User::find(auth()->admin()->id)->update(['password'=> Hash::make($request->password)]);
   
        //  dd('Password change successfully.');
        //$user->update();
        //  return view('edit_profile',compact('user'));
         return redirect()->route('admin.home')->withSuccess('Update success !!!');
       
}
    public function edit(Request $request)

{
    $user = Auth::user();
    //$user = User::where('id',$user_id)->first();
    return view('admin.edit',compact('admin'));

}
   public function update(Request $request)

{
    $user = Auth::admin();

    //$user = User::where('id',$user_id)->first();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->phone_number = $request->phone;
    
    
        
        $user->update();
        // return view('edit_profile',compact('user'));
        return redirect()->route('.home')->withSuccess('Update success !!!');
       
}
}