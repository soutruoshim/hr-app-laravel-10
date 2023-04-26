<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeEmployee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function notice(){
        return $this->belongsTo(Notice::class,'notice_id','id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
