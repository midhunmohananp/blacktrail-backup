<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrixAttachmentController extends Controller
{
	public function store(){
		return response()->json(request()->all());
	}

	public function destroyAttachment(){
		
	}
}
