<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebaktianDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id_kebaktian','waktu','majelis','laki','wanita','anak','persembahan'];

    public function kebaktian()
    {
        return $this->belongsTo(Kebaktian::class,'id_kebaktian','id');
    }
}
