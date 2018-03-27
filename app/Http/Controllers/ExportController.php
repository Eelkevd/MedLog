<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Entry;
use App\Illness;
use Calendar;
use PDF;

class ExportController extends Controller
{
    // authentication requirement
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to show export page
    public function index()
    {
        return view('export.export');
    }

    public function getillnessPDF(Request $request)
    {
      $illness = $request->input('illness');
      $illness_id = Illness::where('illness', $illness)->value('id');
      $entries = Entry::all()->where('illness_id', $illness_id);
      $pdf=PDF::loadView('export.entries', ['entries'=>$entries]);
      return $pdf->download('entries.pdf');
    }

    public function exportperiod()
    {
        return view('export.export');
    }

    public function exportillness()
    {
        return view('export.export');
    }
}
