<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
	protected $table ='cates';
	protected $fillable = ['name','alias','oder','parent_id','keyword','description'];
	// public $timestamps = false;

	public function product(){
		return $this->hasMany('App\Product');
	}
}
