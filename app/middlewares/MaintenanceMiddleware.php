<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 13.11.2014
 * Time: 19:57
 */

class MaintenanceMiddleware extends \Slim\Middleware {
	public function call() {
		$app = $this->app;

		if ($app->config('maintenanceMode') &&
				!in_array($_SERVER['REMOTE_ADDR'], $app->config('debugHosts')) ) {
			$twig = $app->config('twig');
			echo $twig->render('maintenance.html', array('page' => 'Maintenance'));
		} else {
			$this->next->call();
		}
	}
}