<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
