<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriminalGroup extends Model
{
	protected $table= 'criminal_groups';


	/**
	 * A Criminal Group is founded in a specific country.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country()
	{
		// belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
		return $this->belongsTo(Country::class);
	}


}
