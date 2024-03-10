<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'titel',
        'done',
    ];
    protected $casts = [
        'done' => 'boolean',
    ];
    protected $hidden =  [
        
        'updated_at',
    ];
}
