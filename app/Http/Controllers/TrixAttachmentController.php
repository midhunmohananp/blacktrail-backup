<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrixAttachmentController extends Controller
{
	public function store(){
		dd(request()->all());
	}
}
