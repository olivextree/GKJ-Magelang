<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'acara',
        'tanggal_mulai',
        'tanggal_selesai',
        'category',
        'file',
        'status',
        'desc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany(PendaftaranDetails::class, 'pendaftaran_id', 'id');
    }
}
