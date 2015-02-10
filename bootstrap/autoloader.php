<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 17.10.2014
 * Time: 16:34
 */

function __autoLoad($classname) {
	if (file_exists('app/models/'.$classname.'.php')) {
		require_once 'app/models/'.$classname.'.php';
	} else if (file_exists('app/controllers/'.$classname.'.php')) {
		require_once 'app/controllers/'.$classname.'.php';
	} else if (file_exists('app/middlewares/'.$classname.'.php')) {
		require_once 'app/middlewares/'.$classname.'.php';
	} else if (file_exists('helpers/'.$classname.'.php')) {
		require_once 'helpers/'.$classname.'.php';
	}
}
spl_autoload_register('__autoLoad');

$config = array();
foreach (glob('config/*.php') as $file) {
	$config[basename($file, '.php')] = include_once $file;
}