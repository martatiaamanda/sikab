<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lurah extends Model
{
    use HasFactory;

    protected $table = 'lurah';
    protected $fillable = [
        'name',
        'NIP',
        'awal_jabatan',
        'akhir_jabatan',
        'tanda_tangan',
    ]; 

    public $timestamps = false;

}
