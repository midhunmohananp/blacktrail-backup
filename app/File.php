<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{


	use SoftDeletes;

	protected $fillable = [
		'title',
		'overview',
		'price'
	];

	public function criminal()
	{
		return $this->belongsTo(User::class);
    }

}
