<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',[
            'users'=>$users
        ]);
    }

    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
    public function destroy(Request $request) {
        // バリデーション
        //$validatedData = $request->validate([
        //'ids' => 'array|required'
        //]);

//Userクラスのdestroyメソッド呼び出して、引数には主キーをいれている
        User::destroy($request->ids);
        return redirect('users');
    }
    /**
     * ユーザの行ったライブページを表示するアクション。
     *
     * @param  $id  liveのid
     * @return \Illuminate\Http\Response
     */

//    public function wentLive($id)
//    {
//        // idの値でユーザを検索して取得
//        $user = Live::findOrFail($id);
//
//        // 関係するモデルの件数をロード
//        $user->loadRelationshipCounts();
//
//        // ユーザの行ったライブ一覧を取得
//        $wentLive = $user->wentLive()->paginate(10);
//
//        //行ったライブでそれらを表示
//        return view('users.show', [
//            'user' => $user,
//            'wentLive' => $wentLive,
//        ]);
//    }

}
