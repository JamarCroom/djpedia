<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('start');
});

Route::post('/',array('before'=>'csrf'), function()
{
	$rules=array('search_db'=>'required');
	$validation= Validator::make(Input::all(),$rules);
	if ($validation->fails())
	{
		return View::make('search')->withErrors($validation)->withInput();
	}
	else
	{
		$name = Input::get('search_db');

		$entries = DB::select(DB::raw('SELECT DISTINCT id, entry_name FROM entries JOIN keywords ON entries.id=keywords.entry_id
		WHERE entry_name=? OR keyword_name=?',array($name,$name)));
		return View::make()->with($entries);
	}

});
