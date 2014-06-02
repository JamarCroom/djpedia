<?php

class Keyword extends Eloquent
{
	
	public function entry()
	{
		return $this->belongsTo('Entry');
	}


}