<?php

namespace App\Http\Controllers;

use App\Diary;
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

        // Auth::user()
        // //Get user
        // //New diary
        // //Set foreign key of usser
        // //Save diary


        $verifiedUser = User::where('verifyToken', $verifyToken)->firstOrFail();
        // $user_id = $verifiedUser->id;


        $verifiedUser->diary()->create();
        // $diary = new Diary(['user_id' => $user_id]);
        // $diary->save();

        $verifiedUser = User::where('verifyToken', $verifyToken)->firstOrFail()
        ->update(['verifyToken' => null]);

        return redirect('/home')
        ->with('succes', 'Dagboek geactiveerd');
    }
}
