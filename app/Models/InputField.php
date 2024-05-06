<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputField extends Model
{
    use HasFactory;

    public $table = "input_fields";

    public $fillable = [
        'data_type_id',
        'name',
        'type',
        'title',
        'validate'
    ];

    public $timestamps = false;


    public function data_type() {
        return $this->belongsTo(DataType::class, 'data_type_id', 'id');
    }

}
