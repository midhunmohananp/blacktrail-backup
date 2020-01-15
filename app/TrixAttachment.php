<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TrixAttachment extends Model
{
	protected $guarded = [];

	protected $fillable = [
        'field',
        'attachable_type',
        'attachment',
        'disk',
    ];

	public function purge()
	{
		Storage::disk($this->disk)->delete($this->attachment);
		$this->delete();
	}
}
