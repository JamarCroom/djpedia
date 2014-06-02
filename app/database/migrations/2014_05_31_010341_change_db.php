<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::drop('texts');
		Schema::drop('images');
		Schema::drop('audios');
		Schema::drop('videos');

		Schema::create('medias', function($table)
		{
			$table->increments('id');
			$table->string('path');
			$table->string('media_type');
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

}
