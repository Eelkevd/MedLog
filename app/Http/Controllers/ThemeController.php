<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class ThemeController extends Controller
{

  public function update(Request $request)
  {
    Auth::user()->update(['theme' => 'NULL' ]);

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
