<?php

class Entry extends Eloquent  
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entries';

	public function keywords()
	{
		return $this->hasMany('Keyword');
	}

	public function medias()
	{
		return $this->hasMany('Media');
	}

}
