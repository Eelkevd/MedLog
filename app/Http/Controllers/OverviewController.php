<?php
// Controller of the overview section
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
    // authentication requirement
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to show overview page with all diary entries
    public function index()
    {
      $user = Auth::user();
      if($user->diary)
      {
        $sortword = "nope";
        $keyword = "";
        $currentdate = date("Y-m-d H:i:s");
        $search = $user->diary->entries()->where('illness', 'LIKE', '%' . $keyword . '%')
                       ->where('timespan_date', '<=' ,$currentdate)->orderBy('timespan_date', 'DESC')->get();
        $sortillness = $user->diary->entries()->where('illness', 'LIKE', '%' . $sortword . '%')->get();
        $sortintensity = $user->diary->entries()->where('intensity', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = $user->diary->illnesses;
        $entries = $user->diary->entries;

        return view('overview', compact('sortillness','search', 'illnesses', 'sortintensity', 'entries'));
      }
      else
        {
          return view('overview');  
        }
    }

    // function to make search function work
    public function search(Request $request)
    {
      $user = Auth::user();
      $sortword = "nope";
      $keyword = $request->input('search');
      $search = $user->diary->entries()->where('illness', 'LIKE', '%' . $keyword . '%')->get();
      $sortillness = $user->diary->entries()->where('illness', 'LIKE', '%' . $sortword . '%')->get();
      $sortintensity = $user->diary->entries()->where('intensity', 'LIKE', '%' . $sortword . '%')->get();
      $illnesses = $user->diary->illnesses;
      $entries = $user->diary->entries;
      return view('overview', compact('sortillness','search', 'illnesses', 'sortintensity', 'entries'));
    }

    // function to make sort function for illnesses work
    public function sortillness(Request $request)
    {
      $user = Auth::user();
      $sortword = $request->input('illness');
      $keyword = "nope";
      $search = $user->diary->entries()->where('illness', 'LIKE', '%' . $keyword . '%')->get();
      $sortillness = $user->diary->entries()->where('illness', $sortword)->get();;
      $sortintensity = $user->diary->entries()->where('intensity', 'LIKE', '%' . $sortword . '%')->get();
      $illnesses = $user->diary->illnesses;
      $entries = $user->diary->entries;
      return view('overview', compact('sortillness', 'search', 'illnesses', 'sortintensity', 'entries'));
   }

   // function to make sort function for illnesses work
   public function sortintensity(Request $request)
   {
      $user = Auth::user();
      $sortword = $request->input('intensity');
      $keyword = "nope";
      $search = $user->diary->entries()->where('illness', 'LIKE', '%' . $keyword . '%')->get();
      $sortillness = $user->diary->entries()->where('illness', $keyword)->get();
      $sortintensity = $user->diary->entries()->where('intensity', $sortword)->get();

      //
      $illnesses = $user->diary->illnesses;
      $entries = $user->diary->entries;
      return view('overview', compact('sortillness', 'search', 'illnesses', 'sortintensity', 'entries'));
  }
}
