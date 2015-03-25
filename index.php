<?php
session_start();

require 'vendor/autoload.php';
include_once 'bootstrap/autoloader.php';

/***********************************************
 * init Slim
 **********************************************/
use \Slim\Slim as Slim;
Slim::registerAutoloader();
$app = new Slim();
$config['slimConfig'] = array_merge($config['slim'], $config['app']);
$app->config($config['slimConfig']);


/***********************************************
 * init Twig
 **********************************************/
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem();
foreach($config['twig']['tpl_dir'] as $name=>$tpl_path) {
	$loader->addPath($tpl_path, $name);
}
$twig = new Twig_Environment($loader, $config['twig']);
$twig->addGlobal('baseUrl', $app->request()->getRootUri().'/');
$twig->addGlobal('config', $config['app']);
$app->config(array('twig' => $twig));

include_once 'app/middlewares.php';
include_once 'app/routes.php';

$app->run();
