<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Assignment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'lecture_id', 'pdf', 'late_submission', 'status'
    ];

    protected $hidden = [
        'deleted_at', 
    ];
}