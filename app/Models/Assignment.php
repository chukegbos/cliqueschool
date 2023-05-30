<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Assignment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'school_id', 'pdf'
    ];

    protected $hidden = [
        'deleted_at', 
    ];
}