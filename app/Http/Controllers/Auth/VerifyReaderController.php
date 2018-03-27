<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Auth;

class VerifyReaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:reader')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.reader-login');
    }
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
    public function logout()
    {
        //dd("logging out admin");
        Auth::guard('reader')->logout();
        return redirect()->route('reader.dashboard');
    }
}
