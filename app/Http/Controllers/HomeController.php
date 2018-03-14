<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // First check if user is logged in
        $this->middleware('auth');
        // Alternatives:
        // $this->middleware('auth', ['only' => 'index']);
        // $this->middleware('auth', ['except' => 'index']);
    }   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
