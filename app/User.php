<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // このuserに入力されたlives
    public function lives()
    {
        return $this->hasMany(Live::class);
    }


    // このユーザーが行ったライブ
    public function wentLive()
    {
        return $this->belongsToMany(Live::class, 'going', 'user_id', 'live_id')->withTimestamps();
    }

    // $liveIdで指定されたライブへgoingする
    public function going($liveId)
    {
        // すでにgoingしているかの確認
        $exist = $this->is_going($liveId);

        if ($exist) {
            // すでにgoingしていれば何もしない
            return false;
        } else {
            // 未goingであればgoingする
            $this->wentLive()->attach($liveId);
            return true;
        }
    }

    // $liveIdで指定されたライブへgoingを外す
    public function ungoing($liveId)
    {
        // すでにgoingしているかの確認
        $exist = $this->is_going($liveId);

        if ($exist) {
            // すでにgoingしていればgoingを外す
            $this->wentLive()->detach($liveId);
            return true;
        } else {
            // 未goingであれば何もしない
            return false;
        }
    }

    // 指定された$liveIdがにすでにgoingしているかどうかを判断して、goingしていればtrueを返す
    public function is_going($liveId)
    {
        // going中liveの中に $liveIdのものが存在するか
        return $this->wentLive()->where('live_id', $liveId)->exists();
    }

    public function loadRelationshipCounts()
    {
        $this->loadCount('wentLive');
    }

}
