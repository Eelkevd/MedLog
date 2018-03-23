<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;

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
        return view('export');
    }

    public function exportperiod()
    {
        return view('export');
    }

    public function exportillness()
    {
        return view('export');
    }
}
