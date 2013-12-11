<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForkOfColumnToPastesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pastes', function(Blueprint $table)
		{
			$table->integer('fork_of')->after('paste')->unsigned()->nullable();

			$table->foreign('fork_of')
				->references('id')->on('pastes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pastes', function(Blueprint $table)
		{
			$table->dropColumn('fork_of');
		});
	}

}
