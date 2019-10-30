<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    protected $guarded=['id'];


    public function user()
    {
        $this->hasOne(User::class);
    }

    
}
