<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputValue extends Model
{
    use HasFactory;
    protected $table = 'input_values';
    public $fillable = [
        // 'field',
        'input_field_id',
        'value',
        'surat_id',
    ];
    public $timestamps = false;

    public function input_field() {
        return $this->belongsTo(InputField::class, 'input_field_id', 'id');
    }

    public function surat() {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}
