<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
    /**
    * verify the user with a given token
    *
    * @param string $token
    * @return response
    */

    public function verify($verifyToken)
    {

      $verifiedUser = User::where('verifyToken', $verifyToken)->firstOrFail()
        ->update(['verifyToken' => null]);

        return redirect('/home')
         ->with('succes', 'Dagboek geactiveerd');

    }
}
