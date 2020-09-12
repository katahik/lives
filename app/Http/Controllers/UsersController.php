<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id, Request $request)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // ユーザの行ったライブ一覧を取得
        $wentLive = $user->wentLive()->paginate(10);

        // もし、パラメーターのyear,monthで値が入っていれば、その値を$year,$monthに入れる
        // そして、Carbonのクリエイトメソッドでその変数に入れたものを使ってその月の1日をとる
        // Requestクラスのinputメソッドでクエリパラメータの取得(引数にはクエリパラメーターのキーを指定)
        if ($request->has(['year', 'month'])) {
            $year = $request->input('year');
            $month = $request->input('month');
            $firstDay = Carbon::createFromDate($year, $month, 1);
        } else {
            $firstDay = Carbon::now()->firstOfMonth();
        }

        // $firstDay->dayOfWeekが指定月前月の週初めの曜日のインデックス。これに31足す
        $count = 31 + $firstDay->dayOfWeek;
        // 右下の隙間のための計算。
        // 指定月に何週間あるのか計算。はみ出した日にち分があるので切り上げで計算しています。
        // 37/7 = 5.28 ≒　6週間 * 7 = 42日
        $count = ceil($count / 7) * 7;

        Carbon::setWeekStartsAt(Carbon::SUNDAY);//週の最初を日曜日に設定
        Carbon::setWeekEndsAt(Carbon::SATURDAY);//週の最後を土曜日に設定

        $date = $firstDay->copy()->startOfWeek();

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
            'firstDay' => $firstDay,
        ]);
    }

    public function destroy(Request $request)
    {
        // Userクラスのdestroyメソッド呼び出して、引数には主キーをいれている
        User::destroy($request->ids);
        return redirect('users');
    }

}
