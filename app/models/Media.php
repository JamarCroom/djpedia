<?php

class Media extends Eloquent
{
	public function entry()
	{
		return $this->belongsTo('Entry');
	}


}