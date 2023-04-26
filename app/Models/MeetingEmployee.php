<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingEmployee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function meeting(){
        return $this->belongsTo(Meeting::class,'meeting_id','id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
