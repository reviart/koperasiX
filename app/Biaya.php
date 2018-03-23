<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Biaya extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biaya_total', 'tipe', 'admin_id', 'user_id', 'kontrak_id'
    ];

    public function admin(){
      return $this->belongsTo('App\Admin');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function kontrak(){
      return $this->belongsTo('App\Kontrak');
    }
    public function biayadetail(){
      return $this->hasMany('App\BiayaDetail');
    }
}
