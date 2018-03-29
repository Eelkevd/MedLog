<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
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
    public function logout()
    {
        //dd("logging out admin");
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard');
    }
}
