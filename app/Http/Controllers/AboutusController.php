<?php

// Controller of the about us section
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    // show aboutus page/view
    public function aboutus()
    {
        return view('aboutus');
    }
}
