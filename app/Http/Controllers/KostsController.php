<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class KostsController extends Controller
{
	public function index()
	{
		$kosts = Kost::OrderBy("kost_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "kosts",
			"results" => $kosts
		];

		return response()->json($kosts, 200);
	}

	public function add_kost(Request $request) 
	{
		$input = $request->all();
		$kost = Kost::create($input);
		
		return response()->json($kost, 200);
	}

	public function show($kost_id)
	{
		$kost = Kost::find($kost_id);

		if(!$kost) {
			abort(404);
		}

		return response()->json($kost, 200);
	}

	public function update(Request $request, $kost_id)
	{
		$input = $request->all();
		$kost = Kost::find($kost_id);

		if(!$kost) {
			abort(404);
		}

		$kost->fill($input);
		$kost->save();

		return response()->json($kost, 200);
	}

	public function delete($kost_id)
	{
		$kost = Kost::find($kost_id);

		if(!$kost) {
			abort(404);
		}
		
		$kost->delete();
		$message = ['Messages' => 'Delete Data Succesfully', 'kost_id' => $kost_id];

		return response()->json($message, 200);	
	}
}