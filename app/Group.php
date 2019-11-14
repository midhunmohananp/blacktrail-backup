<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	// protected $fillable = ['']

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

/* 
A group has many members(GroupMember) and each member(GroupMember) has many skill
skills -> jiujitsu, taekwondo, hand to hand, ardigma
what if we want to get the group's list of skills
groups
id - integer
display_name - string
motto - string

group_members
user_id - integer (user_id)
group_id - integer
full_name - string

skills
id - integer
group_member_id(group_members) - integer
skill_name - string
*/
        public function skills() {   
           return $this->hasManyThrough(Skill::class, GroupMember::class);
       }


   }
