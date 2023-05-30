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

    public function catigory()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function getStatus(){
      switch ($this->status) {
        case 0:
          return 'Disabled';
          break;
        case 1:
            return 'Active';
            break;
      }
    }

    public function getStatusColor()
    {
      switch ($this->status) {
        case 0:
          return 'danger';
          break;
        case 1:
            return 'success';
            break;
      }
    }

    public function getTeachingType()
    {
      switch ($this->type_teaching) {
        case 1:
          return ['id' => 1, 'name' => "Yes, I’m already teaching an online course"];
          break;
        case 2:
          return ['id' => 2, 'name' => "I teach online (coaching, workshops, etc) but not through an online course"];
          break;
          case 3:
            return ['id' => 3, 'name' => "I’m teaching (I have content), but not online"];
            break;
          case 4:
            return ['id' => 4, 'name' => "I'm just getting started sharing my knowledge"] ;
            break;
      }
    }

    public function getAudience()
    {
      switch ($this->type_teaching) {
        case 1:
          return ['id' => 1, 'name' => "No one yet"];
          break;
        case 2:
          return ['id' => 2, 'name' => "1 - 100 people"];
          break;
          case 3:
            return ['id' => 3, 'name' => "100 - 1,000 people"];
            break;
          case 4:
            return ['id' => 4, 'name' => "1,000 - 5,000 people"] ;
            break;
          case 5:
            return ['id' => 4, 'name' => "5,000 - 10,000 people"] ;
            break;
          case 6:
            return ['id' => 4, 'name' => "10,000 - 50,000 people"] ;
            break;
          case 7:
            return ['id' => 4, 'name' => "50,000+ people"] ;
            break;

      }
    }
}