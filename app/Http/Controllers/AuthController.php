<?php

namespace App\Http\Controllers;

use App\Models\Auth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	
	public function login(Request $request)
	{
		$input = $request->all();

		$validationRules = [
			'email' => 'required|string',
			'password' => 'required|string',
		];

		$validator = \Validator::make($input, $validationRules);

		if ($validator->fails()) {
			return response()->json($validator->errors(), 400);
		}

		$credentials = $request->only(['email', 'password']);

		if (! $token = Auth::attempt($credentials)) {
			return response()->json(['message' => 'Unauthorized'], 401);
		}

		return response()->json([
			'token' => $token,
			'token_type' => 'bearer',
			'expires_in' => Auth::factory()->getTTL() * 60
		], 200);
	}
}