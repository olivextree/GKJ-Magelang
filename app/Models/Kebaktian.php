<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebaktian extends Model
{
    use HasFactory;
    protected $fillable = ['name','jadwal_1','tgl_kebaktian','jadwal_2','jadwal_3','jadwal_4'];

    public function detail()
    {
        return $this->hasMany(KebaktianDetail::class,'id_kebaktian','id');
    }

    public function petugas()
    {
        return $this->hasMany(KebaktianPetugas::class,'id_kebaktian','id');
    }
}
