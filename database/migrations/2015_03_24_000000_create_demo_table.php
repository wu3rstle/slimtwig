<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class Create_Demo_Table extends \Illuminate\Database\Migrations\Migration{

	public function up() {
		Capsule::schema()->create('demo', function($table)
		{
			$table->increments('id');
			$table->string('value');
		});
	}

	public function down() {
		Capsule::schema()->drop('demo');
	}
}

