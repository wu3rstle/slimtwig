<?php
/**
 * The content of this file is (c)  Versandhaus Walz GmbH
 * All rights reserved
 *
 * <Description>
 *
 * Libraries:
 * @link        <link>
 *
 * @copyright   (c) Versandhaus Walz GmbH, all rights reserved
 * @author      negdto
 * @version     $Id: LoggingMiddleware.php <001> 08.12.2014 10:24Z negdto
 */
 
//---- includes --------------------------------------

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class LoggingMiddleware
 *
  * @author negdto
 * 
 * CreateDate: 08.12.2014 @ 10:24
 * LastChangesDate: 08.12.2014
 */

class LoggingMiddleware extends \Slim\Middleware
{
	public function call() {
		$this->app->log->setLevel(\Slim\Log::DEBUG);
		$this->app->log->setWriter(new \Slim\LogWriter(fopen(__DIR__ . '/../../storage/logs/slim-' . date('Y-m-d') . '.log', 'a')));

		$this->next->call();
	}
}
 