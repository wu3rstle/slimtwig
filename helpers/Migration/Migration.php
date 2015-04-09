<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 24.03.2015
 * Time: 08:33
 *
 * @author      wu3rstle
 */

namespace Migration;

//---- includes --------------------------------------

//---- global settings -------------------------------

//---- class -----------------------------------------

/**
 * Class Migration
 *
 * @author wu3rstle
 *
 * CreateDate: 24.03.2015 @ 08:33
 * LastChangesDate: 09.04.2015
 */
class Migration extends \Illuminate\Database\Eloquent\Model {
	/**
	 * fillable db columns
	 *
	 * @var array
	 */
	protected $fillable = ['migration', 'batch'];
	/**
	 * use timestamp columns?
	 *
	 * @var bool
	 */
	public $timestamps = false;
}