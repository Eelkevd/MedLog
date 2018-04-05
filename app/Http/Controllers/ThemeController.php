<?php

// Controller of theme section
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

  //authentication requirement
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $user = Auth::user();
    return view('accounts/thema', compact('user'));
  }

  public function update(Request $request)
  {
    //Auth::user()->update(['theme' => 'default' ]);
    $id = Auth::id();
    $user = User::findOrFail($id);
    User::where('id', $id)->update(['theme' => 'default' ]);


    return back()
    ->with('succes', 'Thema geactiveerd');
  }

  public function update_contrast(Request $request)
  {
    $id = Auth::id();
    $user = User::findOrFail($id);
    User::where('id', $id)->update(['theme' => 'contrast' ]);

    return back()
    ->with('succes', 'Thema geactiveerd');
  }

  public function update_vrolijk(Request $request)
  {
    $id = Auth::id();
    $user = User::findOrFail($id);
    User::where('id', $id)->update(['theme' => 'vrolijk' ]);

    return back()
    ->with('succes', 'Thema geactiveerd');
  }

}
