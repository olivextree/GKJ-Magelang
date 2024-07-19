<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Pendeta extends Model
{
    use HasFactory;
    protected $fillable = ['name','captions','is_active','file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
