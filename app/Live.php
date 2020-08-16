<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    protected $fillable = [
        'title','date','venue','category','artist','min_price','max_price','url', 'lat','lon',
    ];
//    このライブを入力したadmin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

//    このライブに行ったユーザー
//    関数名は仮
    public function livers()
    {
        return $this->belongsToMany(User::class, 'going', 'live_id', 'user_id')->withTimestamps();
    }

}
