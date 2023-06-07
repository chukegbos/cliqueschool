<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Assignment;
use Illuminate\Support\Str;
use App\Models\User;

class Lecture extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'school_id', 'title', 'description', 'video', 'pdf', 'featured_image', 'lecture_code'
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

    public function description(){
        $description = $this->attributes['description'];
        return Str::words($description, 20);
    }

    public function assignment(){
        $id = $this->attributes['id'];
        $assigment = Assignment::where('deleted_at', NULL)->find($id);
        if($assigment){
            return $assigment;
        }
        else{
            return NULL;
        }
    }
}