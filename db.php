<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 24.03.2015
 * Time: 08:25
 *
 * @author      wu3rstle
 */

/**
 * forward commands
 */
require_once 'vendor/autoload.php';
include_once 'bootstrap/autoloader.php';

use Migration\Db;

$db = new Db($argv);
$db->run();