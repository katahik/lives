<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',[
            'users'=>$users
        ]);
    }

    public function show($id,Request $request)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // ユーザの行ったライブ一覧を取得
        $wentLive = $user->wentLive()->paginate(10);
        $value = $request->input('value');

        if($request){
            //sprintf(文字列のフォーマット, 入力したい文字１,　入力したい文字２,・・)
            //%04d が Y(4桁の年) に、次の %02d が m(2桁の月)に対応
            $dateStr = sprintf('%04d-%02d-01', date('Y'), date('m'));
        }else{
            //sprintf(文字列のフォーマット, 入力したい文字１,　入力したい文字２,・・)
            //%04d が Y(4桁の年) に、次の %02d が m(2桁の月)に対応
            $dateStr = sprintf('%04d-%02d-01', date('Y'), date('m'));
        }
        $date = new Carbon($dateStr);
        //ここで dd($date); すると8月1日がとれる
        $date->dayOfWeek;
        //$date->dayOfWeekが指定月前月の週初めの曜日のインデックス。これに31足す
        $count = 31 + $date->dayOfWeek;
        // 右下の隙間のための計算。
        //指定月に何週間あるのか計算。はみ出した日にち分があるので切り上げで計算しています。
        // 37/7 = 5.28 ≒　6週間 * 7 = 42日
        $count = ceil($count / 7) * 7;

        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        //曜日インデックス分の日付を前に戻す。日曜日～土曜日までがインデックスでは0～6
        //subday 日数を減らす
        //dayOfWeek 曜日番号を取得
        $date->subDay($date->dayOfWeek);
        //ここでdd($date);すると7月26日が取れる

        $dates = [];
        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'wentLives' => $wentLive,
            'dates' => $dates,
            'value' => $value,
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

}
