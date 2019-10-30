<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursesubjects extends Model
{
    protected $primary_key = 'coursesubjects_id';
    protected $guarded = ['coursesubjects_id'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
