<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surats';
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function surats() {
        return $this->hasMany(surat::class, 'jenis_surat_id', 'id');
    }

    public function data_types() {
        return $this->hasMany(DataType::class, 'jenis_surat_id', 'id');
    }

    public function surat_pindah() {
        return $this->hasMany(SuratPindah::class, 'jenis_surat_id', 'id');
    }
}
