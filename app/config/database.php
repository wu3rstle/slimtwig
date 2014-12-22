<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 23.10.2014
 * Time: 18:56
 */

return array(
	'connections' => array(
		// primary database connection
		'default' => array(
			'driver'    => 'mysql',
			'host'      => '127.0.0.1',
			'database'  => 'dbname',
			'username'  => 'username',
			'password'  => 'password',
			'charset'   => 'utf8',
			'collation' => 'utf8_general_ci',
			'prefix'    => '',
		),

		// secondary database connection
		/*'second' => array(
			'driver'    => 'mysql',
			'host'      => 'server',
			'database'  => 'dbname',
			'username'  => 'username',
			'password'  => 'password',
			'charset'   => 'utf8',
			'collation' => 'utf8_general_ci',
			'prefix'    => '',
		),*/
	),
);
