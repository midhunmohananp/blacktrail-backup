<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Criminal extends Model
{

	protected $guarded = [];

	protected static $imageFields = [
		'avatar'
	];
	/**
	* a Criminal has a profile.
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasOne
	*/
	public function profile()
	{
				// hasOne(RelatedModel, foreignKeyOnRelatedModel = criminal_id, localKey = id)
		return $this->hasOne(CriminalInfo::class,'criminal_id','id');
	}

	public function getFullNameAttribute()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	/**
	* Criminal belongs to a country.
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function country()
	{
		return $this->belongsTo(Country::class,'country_id','id');
	}


	/*
	Update criminals who's posted_by => 0 and change it to id in the users table..
	*/
	public static function findOrFailById($id){ 
		return self::where('id', $id)->firstOrFail();        
	}

	public static function postedByLoggedOnUser(){
		return static::where('posted_by','=', auth()->user()->id);
	}

	protected function loggedOnUser($value='')
	{
		return auth();	
	}


	/*Get criminals who are followed by the admin / any user / bounty hunters*/
	public function followedBy($user)
	{
		return static::where('user_id',$user);
	}  

	/*
	a Criminal has many crimes
	*/
	public function crimes()
	{ 
		return $this->belongsToMany(Crime::class,'crime_criminal','criminal_id','crime_id')->withPivot("crime_description");
	}



	/*Posted By the logged on user or any user by id.. .. */
	public static function postedByUser($user)
	{
		return static::where('posted_by','=',$user);
	}


	/* captured already */
	public function scopeCaptured($query)
	{
		return $query->where("status",'=',0);
	}	

	/**
	 * status is at large
	*/
	public function scopeNotYetCaptured($query)
	{
		return $query->where("status",'=',1);
	}
	/*
	Ranking by most wanted........
	*/
	public function scopeMostWanted($query)
	{
		return $query->where("status",'=',1);
	}

	/*Update status to Captured*/
	public function capture()
	{
		return $this->update(['status' => 0]);
	}


	public function full_name(){
		return $this->first_name ."" .$this->last_name ; 
	}

	/**
	* Criminal belongs to Respondent.
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function respondent()
	{
	// belongsTo(RelatedModel, foreignKey = respondent_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class,'posted_by','id');
	}	

		// Define the "full_name" property accessor.
		/*	public function getFullNameAttribute()
		{
		return $this->first_name ." " .$this->last_name ; 
	}*/

	public static function saveCriminal($request, $file_name = 'default_avatar.jpg'){
		return Criminal::create([
			'first_name'         =>             $request->input("form.first_name"),
			'middle_name'        =>             $request->input("form.middle_name"),
			'last_name'          =>             $request->input("form.last_name"),
			'alias'              =>             $request->input("form.alias"),
			'country_id'         =>             $request->input("form.country_id"),
			'last_name'          =>             $request->input("form.last_name"),
			'posted_by'          =>             $request->input("form.posted_by"),
			'contact_number'     =>             $request->input("form.contact_number"),
			'status'             =>             $request->input("form.status"),
			'photo'				 => 			$file_name
		])->profile()->create([
			'last_seen'	     	 =>        		$request->input("form.country.label"),
			'country_last_seen'	 =>				$request->input("form.country_id"),
			'bounty'             =>        		$request->input("form.bounty"),
			'currency' => $request->input("form.currency"),
			'complete_description'  =>        	$request->input("form.complete_description")
		]);

	}

}
