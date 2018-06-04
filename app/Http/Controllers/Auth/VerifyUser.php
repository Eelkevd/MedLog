<?php

namespace App\Http\Controllers\Auth;
// Controller for verifying user account

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Auth;

class AdminLoginController extends Controller
{
    /**
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Shows login form
     *
     * @return view
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
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
            'email' => 'required',
            'token' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'token'=> $request->token, 'password' => $request->password], $request->remember)) {
            //login successful
            return redirect()->intended(route('admin.dashboard'));
        }

        //login fails
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Logs out user
     *
     * @return redirect
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard');
    }
}
