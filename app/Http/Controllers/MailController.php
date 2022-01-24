<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    
    public function index(){

	$details = [
    'title' => 'Mail from MamiKos',
    'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('kompmulti1@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email sudah terkirim.");

	}
}