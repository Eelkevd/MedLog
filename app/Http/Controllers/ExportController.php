<?php
// Controller of the Export section
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

    // function to export complete diary
    public function getPDF()
    {
        $entries = Entry::sortByDesc('timespan_date')->get();
        $pdf=PDF::loadView('export.dagboek', ['entries'=>$entries ]);
        return $pdf->download('dagboek.pdf');
    }

    // function to export diary pages of certain illness
    public function getillnessPDF(Request $request)
    {
        $user = Auth::user();
        $illnesses = $user->diary->illnesses;

        $illness_name = $request->input('illness');
        $illness_id = Illness::where('illness', $illness_name)->value('id');
        $entries = Entry::all()->where('illness_id', $illness_id)->sortByDesc('timespan_date');
        $pdf=PDF::loadView('export.dagboek', ['entries'=>$entries, 'illnesses'=>$illnesses]);
        return $pdf->download('dagboek.pdf');
    }

    // function to export diary in certain period
    public function getperiodPDF(Request $request)
    {
        $from_date = $request->input('from_date');
        $end_date = $request->input('end_date');
        $entries = Entry::all()->where('timespan_date', '>=' ,$from_date)->where('timespan_date', '<=' ,$end_date)->sortByDesc('timespan_date');
        $pdf=PDF::loadView('export.dagboek', ['entries'=>$entries ]);
        return $pdf->download('dagboek.pdf');
    }
}

        // $user = Auth::user();

        // $illnesses = $request->input('illness');
        // // $illness = $user->diary->illnesses;

        
        // // foreach ($user->diary->illnesses as $illness) {
        // //     $illness->illness->all();
        // // }
        // // $diary = $user->diary->entries->all();
        // // foreach ($entries as $entry){
        // //  $entry->symptoms->all();
        //  // }

        // // dd($illness);
        // $illness_id = Illness::where('illness', $illnesses)->value('id');
        // $entries = Entry::all()->where('illness_id', $illnesses->id)->sortByDesc('timespan_date');
        // $pdf=PDF::loadView('export.dagboek', ['entries'=>$entries]);
        // return $pdf->download('dagboek.pdf');