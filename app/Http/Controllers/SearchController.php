<?php

namespace App\Http\Controllers;


use App\User;
use App\Illness;
use App\Diary;

class SearchController extends Controller
{
	public function autocomplete(Request $request)
    {
        $term=$request->term;
        $data = Illness::where('illness','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $key => $v){
			$result[]=['value' =>$value->item];
        }
        return response()->json($results);
    }
}
