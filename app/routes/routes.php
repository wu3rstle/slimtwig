<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 17.10.2014
 * Time: 16:40
 *
 * @author wu3rstle
 */

/**
 * Routes
 */
$app->get('/', 'App\\Controllers\\RootController:index')->setParams(array($twig));
$app->get('/admin', 'App\\Controllers\\RootController:admin')->setParams(array($twig));
$app->get('/clearCache', 'App\\Controllers\\RootController:clearCache')->setParams(array($twig));