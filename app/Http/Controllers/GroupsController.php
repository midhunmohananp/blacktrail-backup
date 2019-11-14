<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group ; 
use App\User ; 
use DB ; 
use App\GroupMember ; 


class GroupsController extends Controller
{


	public function index()
	{
		$groups = Group::with('country')->paginate(5) ;
		return view("groups",compact("groups"));	
	}	

	public function skillsOfTheGroup($group)
	{

		
	}

	/*

	Rank them by group_value -> if pila na ang nadakpan
	-> success_rate
	-> 
	and */
	public function searchGroups($country, $byName)
	{

	}


	public function getAll()
	{
		return Group::all();
	}






}
