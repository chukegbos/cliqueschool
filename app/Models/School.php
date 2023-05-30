<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_code', 'user_id', 'type_teaching', 'audience', 'featured_image', 'featured_video', 'name', 'slug', 'views', 'requirements', 'descriptions', 'aim', 'category', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'deleted_at', 
    ];

    public function status(){
      $id = $this->attributes['status'];
      if($id==1){
          return 'Active';
      }
      else{
          return 'Disabled';
      }
  }
}