<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 24.03.2015
 * Time: 08:31
 *
 * @author      wu3rstle
 */

//---- includes --------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class Create_Demo_Table
 *
 * @author wu3rstle
 *
 * CreateDate: 24.03.2015 @ 08:31
 * LastChangesDate: 09.04.2015
 */
class Create_Demo_Table extends \Illuminate\Database\Migrations\Migration{

	/**
	 * migrate function
	 */
	public function up() {
		Capsule::schema()->create('demo', function($table)
		{
			$table->increments('id');
			$table->string('value');
		});
	}

	/**
	 * rollback function
	 */
	public function down() {
		Capsule::schema()->drop('demo');
	}
}

