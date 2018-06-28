<?php

namespace App\Http\Controllers;
use PDF;
// Controller of the about us section

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Show aboutus page/view
     *
     * @return view
     */
    public function aboutus()
    {
        return view('aboutus');
    }

    /**
     * Show privacystatement page/view
     *
     * @return view
     */
    public function privacystatement()
    {
        return view('privacystatement');
    }

    public function getPDF()
    {
        $pdf=PDF::loadView('privacystatementMedBoek');
        return $pdf->download('privacystatementMedBoek.pdf');
    }
}
