<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class CriminalInfo extends Model
{
	use HasTrixRichText;

	protected $table = 'criminal_profiles';
	protected $guarded = [];
	protected $dates = ['birthdate'];

	// Define the "age" property accessor.
	public function getAgeAttribute()
	{
		return now()->diffInYears($this->birthdate);
	}

	/**
	 * CriminalInfo belongs to Country.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country_of_origin()
	{
		// belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
		return $this->belongsTo(Country::class,'country_of_origin','id');
	}


	/**
	 * CriminalInfo belongs to Country.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country_last_seen()
	{
		// belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
		return $this->belongsTo(Country::class,'country_last_seen','id');
	}

	/**
	* a Criminals Information belongs to Criminal.
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function criminal()
	{
	// belongsTo(RelatedModel, foreignKey = criminal_id, keyOnRelatedModel = id)
		return $this->belongsTo(Criminal::class,'criminal_id','id');
	}

	/*find or failing by Id.*/
	public static function findOrFailById($id){ 
		return static::where('criminal_id', $id)->firstOrFail();        
	}
	
}
