<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/User;

class VerifyController extends Controller
{
    /**
    * verify the user with a given token
    *
    * @param string $token
    * @return response
    */

    public function verify($token)
    {

      User::where('verifyToken', $token)->firstOrFail();

        ->update(['verifyToken' -> null, 'status' -> '1' ])

        return redirect
         -> route('home')
         ->with('succes', 'Dagboek geactiveerd');

    }
}
