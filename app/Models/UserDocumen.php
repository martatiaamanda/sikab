<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocumen extends Model
{
    use HasFactory;

    public $table = 'user_documens';

    protected $fillable = [
        'user_id',
        'ktp',
        'kk'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
