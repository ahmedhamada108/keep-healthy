<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class vitamins extends Model
{
    protected $table='vitamins';
    protected $fillable =[
        'id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];
}
