<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBansos extends Model
{
    use HasFactory;

    protected $table = 'data_bansos';

    protected $fillable = [
        'bansos_id',
        'nama',
        'nik',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        // 'nama_ibu',
        // 'umur_ibu',
        // 'pekerjaan_ibu',
        // 'alamat_ibu',
        // 'nama_ayah',
        // 'umur_ayah',
        // 'pekerjaan_ayah',
        // 'alamat_ayah',
        'kk',
        'ktp',
        'sktm',
        'pengantar_rt'
    ];

    public $timestamps = false;

    public function bansos()
    {
        return $this->belongsTo(Bansos::class, 'bansos_id', 'id');
    }
}
