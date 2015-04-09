<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 23.10.2014
 * Time: 18:46
 *
 * @author      wu3rstle
 */

//---- includes --------------------------------------
use \Slim\Slim as Slim;

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class BaseController
 *
 * @author wu3rstle
 *
 * CreateDate: 23.10.2014 @ 18:46
 * LastChangesDate: 09.04.2015
 */

abstract class BaseController
{
	/**
	 * app instance
	 *
	 * @var Slim
	 */
	protected  $app;

	/**
	 * constructor
	 */
	public function __construct() {
		$this->app = Slim::getInstance();
	}
}
