<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 17.10.2014
 * Time: 16:34
 */

$config = array();
foreach (glob('config/*.php') as $file) {
	$config[basename($file, '.php')] = include_once $file;
}