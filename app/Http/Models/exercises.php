<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class exercises extends Model
{
    protected $table='exercises';
    protected $fillable =[
        'id',
        'image_path',
        'title',
        'content',
        'video_url',
        'created_at',
        'updated_at'
    ];

    
}
