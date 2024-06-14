<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;

    protected $table = 'nomor_surat';
    protected $fillable = ['awal', 'akhir', 'tahun' ];

    public $timestamps = false;
}
