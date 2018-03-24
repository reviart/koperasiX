<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kontrak extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_kontrak', 'nama_pekerjaan', 'nama_pelaksana', 'nilai_kerja',
        'tipe', 'tahap_bayar', 'status', 'tgl_kontrak', 'tgl_mulai', 'tgl_selesai', 'admin_id', 'user_id'
    ];

    public function admin(){
      return $this->belongsTo('App\Admin');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function biaya(){
      return $this->hasMany('App\Biaya');
    }
    public function penerimaan(){
      return $this->hasMany('App\Penerimaan');
    }
}
