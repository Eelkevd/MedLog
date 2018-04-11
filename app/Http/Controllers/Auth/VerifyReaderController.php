<!-- Controller for verifying reader -->

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Auth;

class VerifyReaderController extends Controller
{
    /**
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:reader')->except('logout');
    }

    /**
     * Shows login form
     * 
     * @return view
     */
    public function showLoginForm()
    {
        return view('auth.reader-login');
    }

    /**
     * Validates login
     * 
     * @param  Request
     * @return redirect
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('reader')->attempt(['email'=> $request->email, 'token'=> $request->token, 'password' => $request->password], $request->remember)) {
            //login successful
            return redirect()->intended(route('reader.dashboard'));
        }

        //login fails
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Logs out reader
     * 
     * @return redirect
     */
    public function logout()
    {
        Auth::guard('reader')->logout();
        return redirect()->route('reader.dashboard');
    }
}
