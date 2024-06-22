<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;

    protected $table = 'surats';
    public $fillable = [
        'nomor_surat',
        'user_id',
        'jenis_surat_id',
        'status',
        'tanggal_surat',
        'tanggal_disetujui',
        'catatan',
    ];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jenis_surat() {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id', 'id');
    }

    public function input_value() {
        return $this->hasMany(InputValue::class, 'surat_id', 'id');
    }

    public function surat_pindah() {
        return $this->hasMany(SuratPindah::class, 'surat_id', 'id');
    }
}
