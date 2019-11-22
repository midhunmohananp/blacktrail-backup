<?php


/*update criminals -> posted_by to a number  from users table where role_id is either 1 or 2
*/

Route::get("db/update/criminals/posted_by","DatabaseController@updatePostedByColumn");
Route::get("db/update/display-name/null","DatabaseController@setting_criminals_current_display_name_to_null");
Route::get("db/seed/group_members/all","DatabaseController@seedGroupMembers");
Route::get("db/seed/skills/group_members","DatabaseController@seedSkillsTable");
Route::get("db/seed/bounty/criminals","DatabaseController@seedBounty");
Route::get("db/seed/info/criminals","DatabaseController@seed_criminals_info");

Route::get("db/seed/info/criminals/countries","DatabaseController@seedCriminalsCountries");
Route::get("db/erase/criminals/profile","DatabaseController@erase_profile_of_criminals");
Route::post("db/remove/criminals/non-adults","DatabaseController@remove_criminals_who_are_not_adults");

