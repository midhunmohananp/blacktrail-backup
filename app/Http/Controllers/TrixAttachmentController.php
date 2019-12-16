<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrixAttachmentController extends Controller
{
	/*storing attached files in trix..*/
	public function store(){
		if ( request()->hasFile('profile_picture')){
			return response()->json(request()->all());
		} else {
			return response("Nothing");
		}
	}

	public function destroyAttachment(){
		
	}
}
