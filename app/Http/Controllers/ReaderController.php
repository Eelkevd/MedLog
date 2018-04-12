<?php

namespace App\Http\Controllers;
// Controller of the Reader section

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Reader;
use App\Diary;
use App\User;
use App\Traits\Encryptable;

class ReaderController extends Controller
{
    use Encryptable;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * return login page  for reader
     * @return view
     */
    public function login()
    {
        return view('reader/login');
    }

    /**
     * @param  int
     * @return redirect
     */
    public function verify($verifyToken)
    {
        // find the correct diary by token
        $verifiedDiary = Reader::where('verifyToken', $verifyToken)->firstOrFail();
        $reader_id = $verifiedReader->id;

        return redirect('/reader/diary')
        ->with('succes', 'U kunt tijdelijk het dagboek inzien.');
    }

    /**
     * get all diaries that are available to the reader
     *
     * @return view
     */
    public function index()
    {
        // get the person that is logged in (reader)
        $reader_id= Auth::id();
        // get the diaries and than the owners of those $diaries
        // find where reader is allowed to read
        $user = User::with('userDiaries', 'userDiaries.user')->find($reader_id);
        // get the diaries
        $diaries = $user->userDiaries;
        return view('readers/index', compact('diaries'));
    }

    /**
     * returns the user data who the reader is invited to read
     *
     * @param  string
     * @return view
     */
    public function show($client)
    {
        // get the person that is logged in (reader)
        $reader_id= Auth::id();
        // add the symptoms and entries to the array
        $user = User::with(
            'userDiaries',
            'userDiaries.user',
            'userDiaries.entries.symptomes'
        )
        ->find($reader_id);

        $diary = $user->userDiaries->find($client);
        $diary2 = $diary->entries()->paginate(5);

        return view('readers/show', compact('diary', 'diary2'));
    }
}
