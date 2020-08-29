<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoingController extends Controller
{
    /**
     * ライブにgoingするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */

    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのliveをgoingする
        \Auth::user()->going($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのliveをungoingする
        \Auth::user()->ungoing($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
