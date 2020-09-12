<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GoingController extends Controller
{
    /**
     * ライブにgoingするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return Response
     */

    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのliveをgoingする
        Auth::user()->going($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ライブをungoingするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのliveをungoingする
        Auth::user()->ungoing($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
