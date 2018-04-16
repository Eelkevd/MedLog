<?php

namespace App\Http\Controllers;
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
}
