<?php

namespace App\Http\Controllers;

use App\Models\chat;
use Illuminate\Http\Request;

class chatsController extends Controller
{
	public function index()
	{
		$chats = chat::OrderBy("chat_id", "DESC")->paginate(10);

		$outPut = [
			"message" => "chats",
			"results" => $chats
		];

		return response()->json($chats, 200);
	}

	public function add_chat(Request $request) 
	{
		$input = $request->all();
		$chat = chat::create($input);

		return response()->json($chat, 200);
	}

	public function show($chat_id)
	{
		$chat = chat::find($chat_id);

		if(!$chat) {
			abort(404);
		}

		return response()->json($chat, 200);
	}
}