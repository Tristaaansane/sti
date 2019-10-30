<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   protected $primary_key = 'course_id';
   protected $guarded = ['course_id'];

   
   public function subjects(){
      return $this->hasMany(Coursesubjects::class);
   }


}
