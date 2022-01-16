<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistersController extends Controller
{
	public function index()
	{
		$users = User::OrderBy("user_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "users",
			"results" => $users
		];

		return response()->json($users, 200);
	}

	public function register(Request $request) 
	{
		$input = $request->all();
		$user = User::create($input);

		return response()->json($user, 200);
	}

	public function show($user_id)
	{
		$user = User::find($user_id);

		if(!$user) {
			abort(404);
		}

		return response()->json($user, 200);
	}

	public function update(Request $request, $user_id)
	{
		$input = $request->all();
		$user = user::find($user_id);

		if(!$user) {
			abort(404);
		}

		$user->fill($input);
		$user->save();

		return response()->json($user, 200);
	}
}