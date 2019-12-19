<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator ; 
use App\TrixAttachment ; 
use Storage ; 
use Response ; 
class TrixAttachmentController extends Controller
{
/*storing attached files in trix..*/
	public function store(Request $request){	
		// dd(request()->all());	

		$validator = Validator::make(request()->all(), [
			'file' => 'required|file',
		]);

		// return response($validator,201);

		if ($validator->fails()){
			// return response()->json(['message' => "validator fails",406]);
			// return response()->json(['errors'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
		
			return response()->json(['errors'=> $validator->errors()], 406);

		}

		$attachment = request()->file->store('/', $request->disk ?? 'public');
		
		$url = Storage::disk($request->disk ?? config('laravel-trix.storage_disk'))->url($attachment);

		TrixAttachment::create([
			'field' => $request->field,
			'attachable_type' => 'App\CriminalInfo',
			'attachment' => $attachment,
			'disk' => $request->disk ?? config('laravel-trix.storage_disk'),
		]);

		return response()->json(['url' => $url], 201);

	}

	public function destroyAttachment($url){
		$attachment = TrixAttachment::where('attachment', basename($url))->first();
		return response()->json(optional($attachment)->purge());
	}
}
