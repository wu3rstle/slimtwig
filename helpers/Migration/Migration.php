<?php
namespace Migration;

class Migration extends \Illuminate\Database\Eloquent\Model {
	protected $fillable = ['migration', 'batch'];
	public $timestamps = false;
}