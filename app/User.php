<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Carbon\Carbon ; 

class User extends Authenticatable
{
    use Notifiable, Billable;

    public static function findOrFailByToken($code){
        return static::where('confirmation_code', $code)->firstOrFail();
    }


    /**
     * User has many Messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasMany(Message::class,'from','id');
    }

  
    /**
     * User has one Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasOne(Role::class,'id','role_id');
    }

    /**
     * User belongs to Country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        // belongsTo(RelatedModel, foreignKey = country_id, keyOnRelatedModel = id)
        return $this->belongsTo(Country::class,'country_id','id');
    }



        /**
        * 
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $guarded = [
        /*'username', 
        'role_id',
        'display_name', 
        'email',
        'phone_number',
        'password', 
        'country_id',
        'confirmation_code',
        'confirmed_at'
        */
        ];


        /**
        * The attributes that should be hidden for arrays.
        *
        * @var array
        */
        protected $hidden = [
            'password', 'remember_token',
        ];

        // $user->signUp();
        public function signUp($attributes)
        {
            factory(App\User::class,1)->create();
        }

        public function saveUser()
        {
            factory(App\User::class,1)->create();
        }

        public function is_active(){
            return $this->confirmed_at == NULL ? 0 : 1 ; 
        }

        /**
        * User has many traced Criminals.
        *
        * @return \Illuminate\Database\Eloquent\Relations\HasMany
        */
        public function traced_criminals()
        {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
            return $this->hasMany(Criminal::class,'posted_by','id');
        }


        // public function confirmed(){
        //     return $this->status == 1 ? false : true;  
        // }

        public function scopeInactive($query){
            return $query->where('status', '0');
        }

        public function scopeThatHasPhoneNumbers($query){
            return $query->whereNotNull('phone_number');
        }



        protected function roleId(){ 
            return auth()->user()->role_id ; 
        }

        public function isNormalUser(){
            switch($this->roleId()){
                case 3 : return true ; break ;
                default : return false  ; break ; 
            } 
        }

        public function confirm()
        {
            $this->update([
                'confirmed_at' => Carbon::now(),
                'confirmation_code' => null 
            ]);
        }

        /*
        returns true if admin.. 
        */
        public function isAdmin()
        {
            if ( $this->roleId() === 1 || $this->roleId() === 2) { 
                return true ;
            }
            else {
                return false ; 
            }
        }  

        public function postedThis()
        {
            if ( $this->roleId() === 1 || $this->roleId() === 2) { 
                return true ;
            }
            else {
                return false ; 
            }
        }  


        /* A member only belongs to a single group*/
        public function group()
        {
            return $this->hasOne(Group::class);
        }

        public function scopeAdmins($query){
            return $query->whereIn('role_id', [1, 2]);
        }


        /*A member / law enforcer can follow both groups and criminals*/


}
