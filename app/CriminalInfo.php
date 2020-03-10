<?php

namespace App;
use DB ; 
use Illuminate\Database\Eloquent\Model;

class CriminalInfo extends Model
{
	
	protected $table = 'criminal_profiles';
	protected $guarded = [];
	protected $dates = ['birthdate'];
	protected $fillable = [
		'last_seen',
		'country_last_seen',
		'bounty',
		'currency',
		'complete_description',
	];

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

	/*Get body frame values.*/
	 public static function getEnumColumnValues($table, $column) {

	 	$type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;

	 	preg_match('/^enum\((.*)\)$/', $type, $matches);

	 	$enum_values = array();
	 	foreach( explode(',', $matches[1]) as $value )
	 	{
	 		$v = trim( $value, "'" );
	 		$enum_values = array_add($enum_values, $v, $v);
	 	}
	 	
	 	return $enum_values;
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
