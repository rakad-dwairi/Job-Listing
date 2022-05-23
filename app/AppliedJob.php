<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function jobs()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
