<?php

// Controller of (create) illness section
namespace App\Http\Controllers\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Illness;
use App\Diary;

class IllnessController extends Controller
{
	//authentication requirement
	public function __construct()
    {
        $this->middleware('auth');
    }

	// stores illness into database
	public function store (Request $request)
	{
		// find the corresponding diary
		$user = Auth::user();

		// add the diary_id to the request array
		$request->request->add(['diary_id' => $user->diary->id]);
		$request->validate([
						'illness'  => 'required',
				]);
		$illness = Illness::create(request(['illness']));
		$illness->diary()->attach($request->diary_id);
    return redirect ('entries');
	}

	use SearchableTrait;

  protected $searchable = [
        'columns' => [
            'illnesses.illness' => 10,
        ],
    ];

	public function search($request)
	{
			$allIllnesses = Illness::search($query)->get();
	}

}
