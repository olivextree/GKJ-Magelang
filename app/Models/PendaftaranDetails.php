<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pendaftaran_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class,'pendaftaran_id','id');
    }
}
