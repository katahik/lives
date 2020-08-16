<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    protected $fillable = [
        'title','date','venue','category','artist','min_price','max_price','url', 'lat','lon',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
