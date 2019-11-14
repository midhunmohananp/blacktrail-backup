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

    /*a user has many messages*/
    public function messages(){
        return $this->hasMany(Message::class);
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


protected function roleId(){ 
    return auth()->user()->role_id ; 
}

public function isNormalUser(){
    switch($this->roleId()){
        case 3 : return true ; break ;
        default : return false  ; break ; 
    } 
}


public function messages(){
    return $this->hasMany(Message::class);
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
