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

    public function result(Request $request){
//        dd($request);
//        検索結果を$lives変数に代入
        $lat = $request->lat;
        $lng = $request->lng;

//        文字列型をfloatで浮動小数点型へ変更
        $lat1 = (float)$lat;
        $lng1 = (float)$lng;

//        緯度/km = 0.0090133729745762
//        半径（正方形だが）5km  0.0090133729745762 * 5 = 0.04506686487
        $maxLat=$lat1+0.04506686487;
        $minLat=$lat1-0.04506686487;
//        経度/km = 0.010966404715491394
//        半径（正方形だが）5km  0.010966404715491394 * 5 = 0.05483202357
        $maxLng=$lng1+0.05483202357;
        $minLng=$lng1-0.05483202357;


//        config/const.phpから持ってこようとしたものの、おそらく型変換？の関係で計算できず、断念
//        $maxLat=$lat+(config('const.latPerKm')*5);
//        $minLat=$lat-(config('const.latPerKm')*5);
//        $maxLng=$lng+(config('const.lngPerKm')*5);
//        $minLng=$lng-(config('const.lngPerKm')*5);

//dd($lat,$maxLat,$minLat,$lng,$maxLng,$minLng);

//        今日の日付を探す
        $lives = Live::where('date',Carbon::today())
//            latの値が$minLat<=lat<=$maxLat;
            ->whereBetween('lat',[$minLat,$maxLat])
//            lngの値が$minLng<=lng<=$maxLng;
            ->whereBetween('lng',[$minLng,$maxLng])
            ->get();

//        $livesをlives.resultで表示
        return view('lives.result', [
            'lives' => $lives,
        ]);
    }
}
