<?php

Route::get('/criminals/create', 'DashboardController@postCriminalsForm')->name('admin.criminals.new-form');
Route::get('/criminals/{criminal}', 'CriminalsController@show')->name('admin.criminals.show');
Route::get('/criminals/{criminal}/edit', 'CriminalsController@edit')->name('admin.criminals.show');
Route::put("criminals/{criminal}","CriminalsController@update")->name("admin.criminals.update");
Route::delete("criminals/{criminal}","CriminalsController@destroy")->name("admin.criminals.destroy");
Route::get('/criminals', 'DashboardController@criminalsList')->name('admin.criminals');
Route::post('/criminals', 'CriminalsController@store_criminal')->name('admin.criminals.store');

