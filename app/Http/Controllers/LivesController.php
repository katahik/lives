<?php

namespace App\Http\Controllers;

use App\Utils\CalcDistance;
use Illuminate\Http\Request;
use App\Live;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    /lives で一覧表示させる
    public function index()
    {
//        ライブの一覧を取得
        $lives = Live::all();
//        ライブ一覧で表示
        return view('lives.index',[
            'lives' => $lives,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $live = new Live;
//        ライブ作成ビューを表示
        return view('lives.create',[
            'live'=>$live,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//      ライブクラスのインスタンスを作成
        $live = new Live;
//      それぞれのカラムにフォームの値を入れ込む
        $live->title = $request->title;
        $live->date = $request->date;
        $live->venue = $request->venue;
        $live->category = $request->category;
        $live->artist = $request->artist;
        $live->min_price = $request->min_price;
        $live->max_price = $request->max_price;
        $live->url = $request->url;
        $live->live_image = $request->live_image;

//        javaScriptでlat,lngを取得し、それをcreate.blade.phpで受け取る
        $live->lat = $request->lat;
        $live->lng = $request->lng;

//        ログイン中のuser_idをいれる
        $live->user_id =Auth::user()->id;

        $live->save();

        return redirect('lives');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でライブを検索して取得
        $live = Live::findOrFail($id);
        return view('lives.show',[
            'live'=>$live,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でライブを検索して取得
        $live = Live::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('lives.edit', [
            'live' => $live,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $live = Live::findOrFail($id);
        // メッセージを更新
        $live->title = $request->title;
        $live->save();

        // トップページへリダイレクトさせる
        return redirect('lives');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        // バリデーション
        //$validatedData = $request->validate([
        //'ids' => 'array|required'
        //]);

        //Liveクラスのdestroyメソッド呼び出して、引数には主キーをいれている
        Live::destroy($request->ids);
        return redirect('lives');
    }

    public function result(){

//        検索結果を$lives変数に代入
//        引数で、現在地に$lat1,$lng2,目標座標に$lat2,$lng2を取る
//        ループさせて、規定の距離より短いものを抽出したい
        $distance = CalcDistance::google_distance($lat1, $lng1, $lat2, $lng2);

//        一旦今日のライブを表示させた
        $lives = Live::where('date',Carbon::today())->get();

//        $livesをlives.resultで表示
        return view('lives.result', [
            'lives' => $lives,
        ]);


    }
}
