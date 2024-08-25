<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindah extends Model
{
    use HasFactory;

    protected $table = 'surat_pindahs';
    public $fillable = [
        'surat_id',
        'jenis_surat_id',
        "nama",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "kewarganegaraan",
        "agama",
        "perkawinan",
        "pekerjaan",
        'pendidikan',
        'no_kk',
        'alamat_asal',
        'alamat_tujuan',
        'desa_tujuan',
        'kecamatan_tujuan',
        'kabupaten_tujuan',
        'provinsi_tujuan',
        'alasan_pindah',

        'kk',
        'ktp'
    ];

    public $timestamps = false;

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }

    public function jenis_surat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id', 'id');
    }

    public function sub_surat_pindah()
    {
        return $this->hasMany(subSuratPindah::class, 'surat_pindah_id', 'id');
    }
}
