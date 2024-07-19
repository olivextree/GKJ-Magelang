<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebaktianPetugas extends Model
{
    use HasFactory;
    protected $fillable = ['id_kebaktian','waktu','bagian','nama_petugas'];

    public function kebaktian()
    {
        return $this->belongsTo(Kebaktian::class,'id_kebaktian','id');
    }
}
