<?php

require_once 'vendor/autoload.php';
include_once 'bootstrap/autoloader.php';

use Migration\Db;

$db = new Db($argv);
$db->run();