<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subSuratPindah extends Model
{
    use HasFactory;
    
    protected $table = 'sub_surat_pindahs';

    public $fillable = [
        'surat_pindah_id',
        "nama",
        "jenis_kelamin",
        "hubungan",
        'keterangan'
    ];

    public $timestamps = false;

    public function surat_pindah() {
        return $this->belongsTo(SuratPindah::class, 'surat_pindah_id', 'id');
    }
}
