<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class ThemeController extends Controller
{

  public function update(Request $request)
  {
    $id = Auth::id();
    $user = User::findOrFail($id);
    User::where('id', $id)->update(['theme' => 'contrast']);

    return redirect()->back()->with('success', ['Je thema is aangepast!']);
}
