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

        $verifiedUser = User::where('verifyToken', $verifyToken)->firstOrFail()
        ->update(['verifyToken' => null]);
        $user_id = $verifiedUser->id;

        $diary = new Diary(['user_id' => $user_id]);
        $diary->save();


        $user_id = $verifiedUser->id;
        dd($user_id);

        $diary = Diary::create('id_user', $user_id );

        return redirect('/home')
        ->with('succes', 'Dagboek geactiveerd');
    }
}
