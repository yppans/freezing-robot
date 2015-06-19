<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForumCats extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('forum_categories')->insert(
			array(
			['parent_category' => NULL,
			'title' => 'Second Category',
			'subtitle' => 'A different category for different things',
			'weight' => '1'],
			['parent_category' => 4,
			'title' => 'New Subcat',
			'subtitle' => 'What the heck is a subcat?',
			'weight' => '0'],
			['parent_category' => 4,
			'title' => 'Theres no need to argue',
			'subtitle' => 'Parents just dont understand',
			'weight' => '1'],
			['parent_category' => 4,
			'title' => 'I-Man is Out',
			'subtitle' => 'and on the loose!',
			'weight' => '2'],
			)
			);
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('forum_categories', function(Blueprint $table)
		{
			//
		});
	}

}
