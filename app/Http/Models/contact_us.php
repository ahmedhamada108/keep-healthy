<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class contact_us extends Model
{
    protected $table='contact_us';
    protected $fillable =[
        'id',
        'first_name',
        'last_name',
        'email',
        'content',
        'created_at',
        'updated_at'
    ];
}
