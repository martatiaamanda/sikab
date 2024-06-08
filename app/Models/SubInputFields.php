<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubInputFields extends Model
{
    use HasFactory;

    protected $table = 'sub_input_fields';
    protected $fillable = [
        'data_type_id',
        'input_type_id',
    ];

    public $timestamps = false;

    public function data_type() {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }

    public function input_field() {
        return $this->belongsTo(InputField::class, 'input_type_id', 'id');
    }
}
