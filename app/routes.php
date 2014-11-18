<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 17.10.2014
 * Time: 16:40
 */

/**
 * Routes
 */
$app->get('/', 'RootController:index')->setParams(array($twig));
$app->get('/admin', 'RootController:admin')->setParams(array($twig));
$app->get('/clearCache', 'RootController:clearCache')->setParams(array($tpl));