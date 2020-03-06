<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Matriphe\Imageupload\ImageuploadModel;

class Photo extends ImageuploadModel
{
	protected $table = 'photos';
}
