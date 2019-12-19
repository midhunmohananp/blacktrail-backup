<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator ; 
use App\TrixAttachment ; 
use Storage ; 
class TrixAttachmentController extends Controller
{
	/*storing attached files in trix..*/
	public function store(Request $request){	
		// return response()->json($request->all());

		$validator = Validator::make(request()->all(), [
			'image' => 'required|file',
			'modelClass' => 'required',
			'field' => 'required',
		]);

		// return response($validator,201);

		if ($validator->fails()){
			/*return response()->json(['errors'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);*/
			return response("validator fails",406);
		}

		$attachment = request()->file->store('/', $request->disk ?? 'public');

		$url = Storage::disk($request->disk ?? config('laravel-trix.storage_disk'))->url($attachment);

		TrixAttachment::create([
			'field' => $request->field,
			'attachable_type' => $request->modelClass,
			'attachment' => $attachment,
			'disk' => $request->disk ?? config('laravel-trix.storage_disk'),
		]);

		return response()->json(['url' => $url], Response::HTTP_CREATED);

	}

	public function destroyAttachment($url){
		$attachment = TrixAttachment::where('attachment', basename($url))->first();
		return response()->json(optional($attachment)->purge());
	}
}
