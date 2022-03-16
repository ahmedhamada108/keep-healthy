<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class sites extends Model
{
    protected $table='sites';
    protected $fillable =[
        'id',
        'image_path',
        'title',
        'content',
        'site_url',
        'created_at',
        'updated_at'
    ];
}
