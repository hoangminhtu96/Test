<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected $table = 'oders';
    protected $fillable = ['ten_kh','email','sdt','diachi','thanhpho','note'];

    public function oderDetail(){
    	return $this->belogTo('App\OderDetail');
    }
}
