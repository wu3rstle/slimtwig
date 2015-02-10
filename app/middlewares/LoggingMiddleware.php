<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 10.02.2015
 * Time: 07:52
 */

class LoggingMiddleware extends \Slim\Middleware
{
	public function call() {
		$this->app->log->setLevel(\Slim\Log::DEBUG);
		$this->app->log->setWriter(new \Slim\LogWriter(fopen(__DIR__ . '/../../storage/logs/slim-' . date('Y-m-d') . '.log', 'a')));

		$this->next->call();
	}
}
 