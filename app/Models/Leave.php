<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class,'request_by','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'approve_by','id');
    }

    public function leaveType(){
        return $this->belongsTo(LeaveType::class,'leave_type','id');
    }
}
