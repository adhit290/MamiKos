<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowongansController extends Controller
{

	public function index()
	{
		$lowongans = Lowongan::OrderBy("lowongan_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "lowongans",
			"results" => $lowongans
		];

		return response()->json($lowongans, 200);
	}

	public function add_Lowongan(Request $request) 
	{
		$input = $request->all();
		$lowongan = Lowongan::create($input);

		return response()->json($lowongan, 200);
	}

	public function show($lowongan_id)
	{
		$lowongan = Lowongan::find($lowongan_id);

		if(!$lowongan) {
			abort(404);
		}

		return response()->json($lowongan, 200);
	}
	public function update(Request $request, $lowongan_id)
	{
		$input = $request->all();
		$lowongan = Lowongan::find($lowongan_id);

		if(!$lowongan) {
			abort(404);
		}

		$lowongan->fill($input);
		$lowongan->save();

		return response()->json($lowongan, 200);
	}

	public function delete($lowongan_id)
	{
		$lowongan = Lowongan::find($lowongan_id);

		if(!$lowongan) {
			abort(404);
		}
		
		$lowongan->delete();
		$message = ['Messages' => 'Delete Data Succesfully', 'lowongan_id' => $lowongan_id];

		return response()->json($message, 200);	
	}
}