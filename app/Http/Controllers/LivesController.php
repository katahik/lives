<?php

namespace App\Http\Controllers;

use App\Utils\CalcDistance;
use App\Utils\Upload;
use Illuminate\Http\Request;
use App\Live;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\DB;

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
            //ログイン中のユーザーIDで管理者ID(1)か主催者ID(1以外)か条件わけ
        if(Auth::user()->id === 1){
            //全てのライブの一覧を取得
            //更新が新しい順に並べ替え,20項目でページネーション
            $lives = DB::table('lives')->orderBy('updated_at','desc')->paginate(20);
        }else{
            //Liveの中からユーザーidがログイン中のユーザーidのものを取得
            //更新が新しい順に並べ替え,20項目でページネーション
            $lives = DB::table('lives')->where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->paginate(20);
        }
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
        $live->setlist = $request->setlist;

        $liveImage = $request->file('liveImage');
//        dd($request);

        //live_imageカラムはnullabelを設定しているため、live_imageがnullだった場合
        //もし,$liveImageに値が入っていたら、下記の処理
        if(!(is_null($liveImage))){
            //UploadクラスのUploadImage関数で引数に$liveImage
            $uploadImage=Upload::uploadImage($liveImage);
            //uploadImageに値が入っているかつファイルが存在し、問題なくアップロードできたか
            if($uploadImage){
                $live->live_image = $uploadImage;
            }else{
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['userImage' => '画像がアップロードされていないか不正なデータです']);
            }
        }

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
//        それぞれのカラムにフォームの値を入れ込む
        $live->title = $request->title;
        $live->date = $request->date;
        $live->venue = $request->venue;
        $live->category = $request->category;
        $live->artist = $request->artist;
        $live->min_price = $request->min_price;
        $live->max_price = $request->max_price;
        $live->url = $request->url;
        $live->setlist = $request->setlist;

        $liveImage = $request->file('liveImage');
//        dd($liveImage);
        //live_imageカラムはnullabelを設定しているため、live_imageがnullだった場合
        //もし,$liveImageに値が入っていたら、下記の処理
        if(!(is_null($liveImage))){
            //UploadクラスのUploadImage関数で引数に$liveImage
            $uploadImage=Upload::uploadImage($liveImage);
            //uploadImageに値が入っているかつファイルが存在し、問題なくアップロードできたか
            if($uploadImage){
                $live->live_image = $uploadImage;
            }else{
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['userImage' => '画像がアップロードされていないか不正なデータです']);
            }
        }

//        javaScriptでlat,lngを取得し、それをcreate.blade.phpで受け取る
        $live->lat = $request->lat;
        $live->lng = $request->lng;

//        ログイン中のuser_idをいれる
        $live->user_id =Auth::user()->id;
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

        //検索結果を$lives変数に代入

        $query = Live::query();

        //リクエストで渡ってきたものを変数で受け取る
        $freeword = $request->input('freeword');
        $date = $request->input('date');
        $category = $request->input('category');

        $lat = $request->lat;
        $lng = $request->lng;

//        ちゃんと受け取れている
//        dd($freeword, $date,$category,$lat,$lng);

//        debug機能 storage/logsの中に吐き出される
        Log::debug('$freeword="'.$freeword.'"');
        Log::debug('$date="'.$date.'"');
        Log::debug('$category="'.$category.'"');

        //文字列型をfloatで浮動小数点型へ変更
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


//        $dateに値があったらその値から検索、なかったら今日の日付から検索
        if(!empty($date)){
            $query->where('date',$date);
        }else{
            $query->where('date',Carbon::today()->format('Y-m-d'));
        }

//        $freewordに値があったらその値を全カラムから検索、なかったら指定しない
//        \DB::raw() クエリの中でSQLを直接使用できる
        if(!empty($freeword)){
            $query->where( \DB::raw('concat(title,date,venue,category,artist)'), 'like', '%' . $freeword . '%');
        }

//        $categoryに値があったら、その値を検索、なかったら全カテゴリーから検索
        if(!empty($category)){
            $query->where('category','like', '%'.$category.'%');
        }
        if(!empty($lat)){
            $query->whereBetween('lat',[$minLat,$maxLat]);
        }
        if(!empty($lng)){
            $query->whereBetween('lng',[$minLng,$maxLng]);
        }

        //debug機能 storage/logsの中に吐き出される
        $search_sql = $query->toSql();
        Log::debug('$search_sql="'.$search_sql.'""');

        $lives = $query->get();

//        $livesをlives.resultで表示
        return view('lives.result', [
//            検索結果のlivesをbladeへ渡す
            'lives' => $lives,
//            現在地緯度latをbladeへ渡す
            'lat'=>$lat,
//            現在地経度lngをbladeへ渡す
            'lng'=>$lng,
        ]);
    }
}
