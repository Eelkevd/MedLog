<?php

namespace App\Http\Controllers;
// Controller of theme section

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return view
     */
    public function index()
    {
        $user = Auth::user();
        return view('accounts/thema', compact('user'));
    }

    /**
     * function to update default theme
     *
     * @param  Request
     * @return back
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        User::where('id', $id)->update(['theme' => 'default' ]);

        return back()
        ->with('succes', 'Thema geactiveerd');
    }

    /**
     * function to update contrast theme
     *
     * @param  Request
     * @return back
     */
    public function update_contrast(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        User::where('id', $id)->update(['theme' => 'contrast' ]);

        return back()
        ->with('succes', 'Thema geactiveerd');
    }

    /**
     * function to update happy ('vrolijk') theme
     *
     * @param  Request
     * @return back
     */
    public function update_vrolijk(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        User::where('id', $id)->update(['theme' => 'vrolijk' ]);

        return back()
        ->with('succes', 'Thema geactiveerd');
    }
}
