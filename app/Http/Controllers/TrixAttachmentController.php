<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Validator;
use App\TrixAttachment ; 
use Storage;
use Response;
class TrixAttachmentController extends Controller
{	
	/*storing attached files in trix..*/
	public function store(Request $request){	

		$validator = Validator::make(request()->all(), [
			'file' => 'required|file',
		]);

		if ($validator->fails()){
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

		return response()->json([
			'url' => $url,
			'attachment_name' => $attachment
		], 201);
		
	}

	public function destroyAttachment($url){	
		$attachment = TrixAttachment::where('attachment', basename($url))->first();
/*
		if( now()->minute <= (Carbon::parse($attachment->created_at)->minute + 30) )
			return response()->json(['status', 'denied']);
*/
		return response()->json(optional($attachment)->purge());

	}

}
