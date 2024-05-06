<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    use HasFactory;

    protected $table = 'data_types';
    public $fillable = [
        'jenis_surat_id',
        'name',
    ];
    public $timestamps = false;

    public function input_fields() {
        return $this->hasMany(InputField::class, 'data_type_id', 'id');
    }
}
