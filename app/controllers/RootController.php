<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 23.10.2014
 * Time: 18:47
 *
 * @author wu3rstle
 */
namespace App\Controllers;
//---- includes --------------------------------------

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class BaseController
 *
 * @author wu3rstle
 *
 * CreateDate: 23.10.2014 @ 18:47
 * LastChangesDate: 09.04.2015
 */

class RootController extends BaseController
{
	/**
	 * relative url: /
	 *
	 * @param Twig_Autoloader $twig template engine
	 */
	public function index($twig){
		echo $twig->render('@frontend/index.html', array('page' => 'home'));
	}

	/**
	 * relative url: /admin
	 *
	 * @param Twig_Autoloader $twig template engine
	 */
	public function admin($twig){
		echo $twig->render('@admin/index.html', array('page' => 'admin'));
	}

	/**
	 * relative url: /clearcache
	 *
	 * @param Twig_Autoloader $twig template engine
	 */
	function clearCache($twig){
		$twig->clearCacheFiles();
		$this->app->redirect($this->app->request()->getRootUri());
	}
}
