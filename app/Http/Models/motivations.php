<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class motivations extends Model
{
    protected $table='messages';
    protected $fillable =[
        'id',
        'name',
        'job',
        'content',
        'image_path',
        'created_at',
        'updated_at'
    ];
}
