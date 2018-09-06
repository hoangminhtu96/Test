<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = ['name','alias','price','intro','content','image','keyword','description','admin_id','cate_id'];
    // public $timestamps = false;

    public function cate(){
    	return $this->belongTo('App\Cate');
    }
    public function admin(){
    	return $this->belongTo('App\admin');
    }
    public function pimages(){
    	return $this->hasMany('App\ProductImage');
    }

}
