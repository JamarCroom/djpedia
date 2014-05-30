<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDjpediansAndEntriesAndKeywordsAndTextsAndImagesAndAudioAndVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('djpedians', function($table)
		{
			$table->increments('id');
			$table->string('djname');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->enum('is_curator', array('yes', 'no'));
			$table->enum('is_contributor',array('yes','no'));
			$table->enum('is_editor',array('yes','no'));
		});

		Schema::create('entries', function($table)
		{
			$table->increments('id');
			$table->string('entry_name');
			$table->enum('is_approved',array('yes','no'));
			$table->enum('is_edited',array('yes','no'));
			$table->string('entry_creator');

		});

		Schema::create('keywords', function($table)
		{
			$table->increments('id');
			$table->string('keyword_name');
			$table->integer('entry_id')->foreign('entry_id')->references('id')->on('entries');
		});

		Schema::create('texts', function($table)
		{
			$table->increments('id');
			$table->string('path');
			$table->integer('entry_id')->foreign('entry_id')->references('id')->on('entries');
		});

		Schema::create('audios', function($table)
		{
			$table->increments('id');
			$table->string('path');
			$table->integer('entry_id')->foreign('entry_id')->references('id')->on('entries');
		});

		Schema::create('videos', function($table)
		{
			$table->increments('id');
			$table->string('path');
			$table->integer('entry_id')->foreign('entry_id')->references('id')->on('entries');
		});

		Schema::create('images', function($table)
		{
			$table->increments('id');
			$table->string('path');
			$table->integer('entry_id')->foreign('entry_id')->references('id')->on('entries');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('djpedians');
		Schema::drop('entries');
		Schema::drop('keywords');
		Schema::drop('texts');
		Schema::drop('audios');
		Schema::drop('videos');
		Schema::drop('images');

	}

}
