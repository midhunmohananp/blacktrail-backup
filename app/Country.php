<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	/**
	 * Country has many Users.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
		return $this->hasMany(User::class,'country_id','id');
	}


	public function criminal_groups()
	{
		return $this->hasMany(CriminalGroup::class, 'country_of_origin_id','id');
	}


	/**
	 * Country has many Criminal_profile.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function criminal_profile()
	{
			// hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
		return $this->hasMany(CriminalInfo::class,'country_of_origin','id');
	}



	/**
	 * Country has many Criminals.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function criminals()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
		return $this->hasMany(Criminal::class,'country_id','id');
	}


}
