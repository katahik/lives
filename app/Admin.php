<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
//    このadminに入力されたlives
    public function lives()
    {
        return $this->hasMany(Live::class);
    }


}
