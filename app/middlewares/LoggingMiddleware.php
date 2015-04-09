<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 10.02.2015
 * Time: 07:52
 *
 * @author wu3rstle
 */

//---- includes --------------------------------------

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class LoginMiddleware
 *
 * @author wu3rstle
 *
 * CreateDate: 10.02.2015 @ 07:52
 * LastChangesDate: 09.04.2015
 */
class LoggingMiddleware extends \Slim\Middleware
{
	/**
	 * auto call function
	 */
	public function call() {
		$this->app->log->setLevel(\Slim\Log::DEBUG);
		$this->app->log->setWriter(new \Slim\LogWriter(fopen(__DIR__ . '/../../storage/logs/slim-' . date('Y-m-d') . '.log', 'a')));

		$this->next->call();
	}
}
 