<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $table = 'user_data';

    protected $fillable = [
        'user_id',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_hp',
        'profile_ficture'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
