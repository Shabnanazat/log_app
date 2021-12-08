<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    /**
     * Login the user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        //Validation...
        $this->validator($request);
        
        //Login the user...
        if(Auth::guard('user')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            
        //Redirect the user to dashboard...
            return redirect()
                ->intended(route('user.home'))
                ->with('status','You are Logged in as User!');
        }
         //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the user.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      //logout the user...
      Auth::guard('user')->logout();
        return redirect()
        ->route('user.login')
        ->with('status','User has been logged out!');
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
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.rquired'=>'Please fill email address',
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);

    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
      //Login failed...

      return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');
    }

}
