<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    /**
     * Login the user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(Request $request)
    {
        //Validation...
        $this->validator($request);
        
        //create the user...
        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
          ]);
         //Authentication failed...
         if($user){

            return redirect()->route('user.home')->withSuccess('hii');
         }else
        return $this->registrationFailed();
    }

    

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
      //validate the form...

      //validation rules.
        $rules = [
            
            'first_name'    => 'required|min:2|max:191',
            'last_name'    => 'required|min:1|max:191',
            'phone_number'    => 'required',
            'email'    => 'required|email||unique:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.rquired'=>'Please fill email address',
            'email.unique' => 'Email alreaady existing our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);

    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function registrationFailed()
    {
      //Login failed...

      return redirect()
        ->back()
        ->withInput()
        ->with('error','User Registration failed, please try again!');
    }

}
