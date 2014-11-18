<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 23.10.2014
 * Time: 18:47
 */

class RootController extends BaseController
{
	public function index($twig){
		echo $twig->render('@frontend/index.html', array('page' => 'home'));
	}

	public function admin($twig){
		echo $twig->render('@admin/index.html', array('page' => 'admin'));
	}

	function clearCache($twig){
		$twig->clearCacheFiles();
		$this->app->redirect($this->app->request()->getRootUri());
	}
}
