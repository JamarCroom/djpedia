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
	$validation= Validator::make(Input::get('search_db'),$rules);
	if ($validation->fails())
	{
		return Redirect::to('search')->withErrors($validation)->withInput();
	}
	else
	{
		$name = Input::get('search_db');

		$entries = DB::select(DB::raw('SELECT DISTINCT id, entry_name FROM entries JOIN keywords ON entries.id=keywords.entry_id
		WHERE entry_name=? OR keyword_name=?',array($name,$name)));
		return Redirect::to('search')->with($entries);
	}

});

Route::get('show/$id', function($id)
{
	$text = DB::table('entry')
	->join('medias','entry.id','medias_entry_id')
	->where('entry.id','=',$id)
	->where('media.media_type','=','text');

	$audio = Media::find($id)->where('media_type','=','audio');
	$video = Media::find($id)->where('media_type','=','video');
	$image = Media::find($id)->where('media_type','=','image');

	Entry::find($id)->medias()->where('media_type','=','text');

	return View::make('search')->with($text)->with($audio)->with($video)->with($image);
});
