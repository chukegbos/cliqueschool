<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'slug'
    ];

    protected $hidden = [
        'deleted_at', 
    ];

    public function school(){
        return $this->hasOne(School::class, 'category');
    }
}