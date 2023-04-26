<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meeting_employee()
    {
        return $this->hasMany(MeetingEmployee::class);
    }
}
