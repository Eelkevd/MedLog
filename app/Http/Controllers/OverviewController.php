<!-- Controller of the overview section -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Diary;
use App\Entry;
use App\Symptom;
use App\Illness;
use App\Medication;
use App\Tool;

class OverviewController extends Controller
{
    /**
     * authentication requirement
     *
     *  @return void 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * function to show overview page with all diary entries
     * 
     * @return view
     */
    public function index()
    {
        $user = Auth::user();
        if($user->diary)
        {
            $sortword = "nope";
            $currentdate = date("Y-m-d H:i:s");
            $search = $user->diary->entries()
                ->where('illness', 'LIKE', '%' . $sortword . '%')
                ->where('timespan_date', '<=' ,$currentdate)
                ->orderBy('timespan_date', 'DESC')
                ->get();
            $sortillness = $user->diary->entries()
                ->where('illness', 'LIKE', '%' . $sortword . '%')
                ->orderBy('timespan_date', 'DESC')
                ->get();
            $sortintensity = $user->diary->entries()
                ->where('intensity', 'LIKE', '%' . $sortword . '%')
                ->orderBy('timespan_date', 'DESC')
                ->get();
            $illnesses = $user->diary->illnesses->sortByDesc('timespan_date');
            $entries = $user->diary->entries()
                ->orderBy('timespan_date', 'DESC')
                ->orderBy('timespan_time', 'DEC')
                ->paginate(5);

            return view('overview', compact(
                'sortillness',
                'search', 
                'illnesses', 
                'sortintensity', 
                'entries'
            ));
        }else
        {
            return view('overview');
        }
    }

    /**
     * function to make search function work
     * 
     * @param  Request
     * @return view
     */
    public function search(Request $request)
    {
        $user = Auth::user();
        $sortword = "nope";
        $keyword = $request->input('search');
        $search = $user->diary->entries()
            ->where('illness', 'LIKE', '%' . $keyword . '%')
            ->orderBy('timespan_date', 'DESC')->orderBy('timespan_time', 'DESC')
            ->get();
        $sortillness = $user->diary->entries()
            ->where('illness', 'LIKE', '%' . $sortword . '%')
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $sortintensity = $user->diary->entries()
            ->where('intensity', 'LIKE', '%' . $sortword . '%')
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $illnesses = $user->diary->illnesses->sortByDesc('timespan_date');
        $entries = $user->diary->entries->sortByDesc('timespan_date');

        return view('diarysearch', compact(
            'sortillness',
            'search', 
            'illnesses', 
            'sortintensity', 
            'entries'
        ));
    }

    /**
     * function to make sort function for illnesses work
     * 
     * @param  Request
     * @return view
     */
    public function sortillness(Request $request)
    {
        $user = Auth::user();
        $sortword = $request->input('illness');
        $keyword = "nope";
        $search = $user->diary->entries()
            ->where('illness', 'LIKE', '%' . $keyword . '%')
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $sortillness = $user->diary->entries()
            ->where('illness', $sortword)
            ->orderBy('timespan_date', 'DESC')
            ->orderBy('timespan_time', 'DESC')
            ->get();
        $sortintensity = $user->diary->entries()
            ->where('intensity', 'LIKE', '%' . $sortword . '%')
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $illnesses = $user->diary->illnesses->sortByDesc('timespan_date');
        $entries = $user->diary->entries->sortByDesc('timespan_date');

        return view('diarysearch', compact(
            'sortillness', 
            'search', 
            'illnesses', 
            'sortintensity', 
            'entries'
        ));
    }

    /**
     * function to make sort intensity function for illnesses work
     * 
     * @param  Request
     * @return view
     */
    public function sortintensity(Request $request)
    {
        $user = Auth::user();
        $sortword = $request->input('intensity');
        $keyword = "nope";
        $search = $user->diary->entries()
            ->where('illness', 'LIKE', '%' . $keyword . '%')
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $sortillness = $user->diary->entries()
            ->where('illness', $keyword)
            ->orderBy('timespan_date', 'DESC')
            ->get();
        $sortintensity = $user->diary->entries()
            ->where('intensity', $sortword)
            ->orderBy('timespan_date', 'DESC')
            ->orderBy('timespan_time', 'DESC')
            ->get();
        $illnesses = $user->diary->illnesses->sortByDesc('timespan_date');
        $entries = $user->diary->entries->sortByDesc('timespan_date');

        return view('diarysearch', compact(
            'sortillness', 
            'search', 
            'illnesses', 
            'sortintensity', 
            'entries'
        ));
    }
}
