<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;
    protected $guard = "admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';
    protected $fillable = [
        'username', 'email', 'password','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function product(){
        return $this->hasMany('App\Product');
    }

}
