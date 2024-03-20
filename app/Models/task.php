<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


    public function creator(): BelongsTo
    {
      return $this->belongsTo(User::class, 'creator_id');
    }
}
