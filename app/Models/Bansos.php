<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $fillable = [
        'nomor_bansos',
        'user_id',
        'perihal',
        'status',
        'tanggal_bansos',
        'tanggal_disetujui',
        'catatan'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function data_bansos()
    {
        return $this->hasOne(DataBansos::class, 'bansos_id', 'id');
    }
}
