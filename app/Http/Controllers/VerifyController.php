<?php

namespace App\Http\Controllers;
// Controller for verifying new users

use Illuminate\Http\Request;
use App\Diary;
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
        // find the correct user by token
        $verifiedUser = User::where('verifyToken', $verifyToken)->firstOrFail();
        $user_id = $verifiedUser->id;

        // insert a new diary in the database for the user
        $diary = new Diary(['user_id' => $user_id]);
        $diary->save();

        // empty the token to verify the user
        $verifiedUser->update(['verifyToken' => null]);

        return redirect('/home')
        ->with('succes', 'Dagboek geactiveerd');
    }

    /**
     * Return view when succesfully verified
     *
     * @return redirect
     */
    public function invite()
    {
        return redirect('/')
        ->with('succes', 'log in om de met u gedeelde gegevens te bekijken');
    }
}
