<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class paymentsController extends Controller
{
	public function index()
	{
		$payments = Payment::OrderBy("pembayaran_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "payments",
			"results" => $payments
		];

		return response()->json($payments, 200);
	}

	public function add_payment(Request $request) 
	{
		$input = $request->all();
		$Payment = Payment::create($input);

		return response()->json($Payment, 200);
	}

	public function show($pembayaran_id)
	{
		$Payment = Payment::find($pembayaran_id);

		if(!$Payment) {
			abort(404);
		}

		return response()->json($Payment, 200);
	}

	public function update(Request $request, $pembayaran_id)
	{
		$input = $request->all();
		$Payment = Payment::find($pembayaran_id);

		if(!$Payment) {
			abort(404);
		}

		$Payment->fill($input);
		$Payment->save();

		return response()->json($Payment, 200);
	}

	public function delete($pembayaran_id)
	{
		$Payment = Payment::find($pembayaran_id);

		if(!$Payment) {
			abort(404);
		}
		
		$Payment->delete();
		$message = ['Messages' => 'Delete Data Succesfully', 'pembayaran_id' => $pembayaran_id];

		return response()->json($message, 200);	
	}
}