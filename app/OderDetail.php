<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    protected $table = 'oder_details';
    protected $fillable = ['ten_kh','user_id','qty','price','total','tensp'];

    public function oder(){
    	return $this->belogTo('App\Oder');
    }
}
