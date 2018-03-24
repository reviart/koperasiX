<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){
      return $this->belongsTo('App\Admin');
    }
    public function kontrak(){
      return $this->hasMany('App\Kontrak');
    }
    public function biaya(){
      return $this->hasMany('App\Biaya');
    }
    public function penerimaan(){
      return $this->hasMany('App\Penerimaan');
    }
}
