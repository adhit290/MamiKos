<?php

namespace App\Http\Controllers;

use App\Models\Apartemen;
use Illuminate\Http\Request;

class apartemensController extends Controller
{
	public function index()
	{
		$apartemens = Apartemen::OrderBy("apartemen_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "apartemens",
			"results" => $apartemens
		];

		return response()->json($apartemens, 200);
	}

	public function add_apartemen(Request $request) 
	{
		$input = $request->all();
		$apartemen = Apartemen::create($input);

		return response()->json($apartemen, 200);
	}

	public function show($apartemen_id)
	{
		$apartemen = Apartemen::find($apartemen_id);

		if(!$apartemen) {
			abort(404);
		}

		return response()->json($apartemen, 200);
	}

	public function update(Request $request, $apartemen_id)
	{
		$input = $request->all();
		$apartemen = Apartemen::find($apartemen_id);

		if(!$apartemen) {
			abort(404);
		}

		$apartemen->fill($input);
		$apartemen->save();

		return response()->json($apartemen, 200);
	}

	public function delete($apartemen_id)
	{
		$apartemen = Apartemen::find($apartemen_id);

		if(!$apartemen) {
			abort(404);
		}
		
		$apartemen->delete();
		$message = ['Messages' => 'Delete Data Succesfully', 'apartemen_id' => $apartemen_id];

		return response()->json($message, 200);	
	}
}