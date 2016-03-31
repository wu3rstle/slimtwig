<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 14.11.2014
 * Time: 17:48
 *
 * @author wu3rstle
 */

/**
 * Middlewares
 */
$app->add(new App\Middlewares\MaintenanceMiddleware());
$app->add(new App\Middlewares\LoggingMiddleware());