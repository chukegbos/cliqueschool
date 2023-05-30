<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Lecture extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'school_id', 'title', 'description', 'video', 'pdf', 'featured_image'
    ];

    protected $hidden = [
        'deleted_at', 
    ];

    public function learner(){
        $user_id = $this->attributes['user_id'];
        $user = User::where('deleted_at', NULL)->find($user_id);
        if($user){
            return $user;
        }
        else{
            return NULL;
        }
    }
}