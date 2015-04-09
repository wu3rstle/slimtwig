<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 17.10.2014
 * Time: 16:34
 *
 * @author wu3rstle
 */

$config = array();
foreach (glob('config/*.php') as $file) {
	$config[basename($file, '.php')] = include_once $file;
}

/***********************************************
 * init Eloquent ORM
 **********************************************/
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();
foreach($config['database']['connections'] as $name=>$connection) {
	$capsule->addConnection($connection, $name);
}
$capsule->setAsGlobal();
$capsule->bootEloquent();