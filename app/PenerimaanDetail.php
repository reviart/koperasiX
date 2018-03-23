<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PenerimaanDetail extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nilai', 'admin_id', 'user_id', 'penerimaan_id'
    ];

    public function admin(){
      return $this->belongsTo('App\Admin');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function penerimaan(){
      return $this->belongsTo('App\Penerimaan');
    }
}
