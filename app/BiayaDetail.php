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
        'biaya', 'admin_id', 'user_id', 'biaya_id'
    ];

    public function admin(){
      return $this->belongsTo('App\Admin');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function biaya(){
      return $this->belongsTo('App\Biaya');
    }
}
