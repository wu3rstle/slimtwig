<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 23.10.2014
 * Time: 18:46
 */

use \Slim\Slim as Slim;

abstract class BaseController
{
	protected  $app;

	public function __construct() {
		$this->app = Slim::getInstance();
	}
}
