<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Tool;
use App\Diary;

class ToolController extends Controller
{
	// Authentication requirement
	public function __construct()
	{
      $this->middleware('auth');
  	}

  	// Function to go to te tool page on nav btn click
	public function home()
	{
		$user = Auth::user();
		$tools = $user->diary->tools;
		return view('tool/tool', compact('tools'));
	}

	// Function to go to the create new tool page
	public function create()
	{
		return view('tool/create_tool');
	}

	// Function to store newly created tool into the db
	public function store(Request $request)
	{
		// Check if user is logged in
		if (Auth::check())
		{

			// find the corresponding diary
			$user = Auth::user();

			// add the diary_id to the request array
			$request->request->add(['diary_id' => $user->diary->id]);

			// add the tool into the tools entries
			$tool = Tool::create(request([
				'tool', 
				'purpose', 
				'origin', 
				'return_date',
				'price', 
				'comment'
			]));
			$tool->diaries()->attach($request->diary_id);

			return redirect ('tool');
		}
	}

	// Function to show selected tools
	public function show($id)
	{
		$tool= Tool::findOrFail($id);
    	return view('tool.show_tool', compact('tool'));
	}
}