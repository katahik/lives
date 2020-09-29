<?php

namespace App\Http\Controllers;

use App\Utils\Upload;
use Illuminate\Http\Request;
use App\Live;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\DB;

// CreateLive(Edit)で設定したバリデーションをよみこむ
use App\Http\Requests\CreateLive;
use App\Http\Requests\EditLive;

class LivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    // lives で一覧表示させる
    public function index()
    {
        // ログイン中のユーザーIDで管理者ID(1)か主催者ID(1以外)か条件わけ
        if (Auth::user()->id === 1) {
            // 全てのライブの一覧を取得
            // 更新が新しい順に並べ替え,20項目でページネーション
            $lives = DB::table('lives')->orderBy('updated_at', 'desc')->paginate(20);
        } else {
            // Liveの中からユーザーidがログイン中のユーザーidのものを取得
            // 更新が新しい順に並べ替え,20項目でページネーション
            $lives = DB::table('lives')->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(20);
        }
        //ライブ一覧で表示
        return view('lives.index', [
            'lives' => $lives,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $live = new Live;
        // ライブ作成ビューを表示
        return view('lives.create', [
            'live' => $live,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    // CreateLiveクラスの情報が$requestに詰まっている
    // CreateLiveクラスはバリデーションを定義している
    public function store(CreateLive $request)
    {
        //ライブクラスのインスタンスを作成
        $live = new Live;
        //それぞれのカラムにフォームの値を入れ込む
        $live->title = $request->title;
        $live->date = $request->date;
        $live->venue = $request->venue;
        $live->address = $request->address;
        $live->category = $request->category;
        $live->artist = $request->artist;
        $live->min_fee = $request->min_fee;
        $live->max_fee = $request->max_fee;
        $live->url = $request->url;
        $live->setlist = $request->setlist;

        $liveImage = $request->file('liveImage');

        // live_imageカラムはnullabelを設定しているため、live_imageがnullだった場合
        // もし,$liveImageに値が入っていたら、下記の処理
        if (!(is_null($liveImage))) {
            // UploadクラスのUploadImage関数で引数に$liveImage
            $uploadImage = Upload::uploadImage($liveImage);
            // uploadImageに値が入っているかつファイルが存在し、問題なくアップロードできたか
            if ($uploadImage) {
                $live->live_image = $uploadImage;
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['userImage' => '画像がアップロードされていないか不正なデータです']);
            }
        }

        // javaScriptでlat,lngを取得し、それをcreate.blade.phpで受け取る
        $live->lat = $request->lat;
        $live->lng = $request->lng;

        // ログイン中のuser_idをいれる
        $live->user_id = Auth::user()->id;

        $live->save();

        return redirect('lives');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        // idの値でライブを検索して取得
        $live = Live::findOrFail($id);

        // ログイン中のuserのidを変数$userIdへ格納
        $userId = Auth::id();

        return view('lives.show', [
            'live' => $live,
            'userId' => $userId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EditLive $request, int $id)
    {
        $live = Live::findOrFail($id);
        // それぞれのカラムにフォームの値を入れ込む
        $live->title = $request->title;
        $live->date = $request->date;
        $live->venue = $request->venue;
        $live->address = $request->address;
        $live->category = $request->category;
        $live->artist = $request->artist;
        $live->min_fee = $request->min_fee;
        $live->max_fee = $request->max_fee;
        $live->url = $request->url;
        $live->setlist = $request->setlist;

        $liveImage = $request->file('liveImage');
        // live_imageカラムはnullabelを設定しているため、live_imageがnullだった場合
        // もし,$liveImageに値が入っていたら、下記の処理
        if (!(is_null($liveImage))) {
            // UploadクラスのUploadImage関数で引数に$liveImage
            $uploadImage = Upload::uploadImage($liveImage);
            // uploadImageに値が入っているかつファイルが存在し、問題なくアップロードできたか
            if ($uploadImage) {
                $live->live_image = $uploadImage;
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['userImage' => '画像がアップロードされていないか不正なデータです']);
            }
        }

        // jsでlat,lngを取得し、それをcreate.blade.phpで受け取る
        $live->lat = $request->lat;
        $live->lng = $request->lng;

        // ログイン中のuser_idをいれる
        $live->user_id = Auth::user()->id;
        $live->save();
        // トップページへリダイレクトさせる
        return redirect('lives');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        // Liveクラスのdestroyメソッド呼び出して、引数には主キーをいれている
        Live::destroy($request->ids);
        return redirect('lives');
    }

    public function result(Request $request)
    {
        // 検索結果を$lives変数に代入
        $query = Live::query();

        // リクエストで渡ってきたものを変数で受け取る
        $freeword = $request->input('freeword');
        $date = $request->input('date');
        $category = $request->input('category');

        $lat = $request->lat;
        $lng = $request->lng;


        // debug機能 ログはstorage/logsの中に吐き出される
        Log::debug('$freeword="' . $freeword . '"');
        Log::debug('$date="' . $date . '"');
        Log::debug('$category="' . $category . '"');

        // 文字列型をfloatで浮動小数点型へ変更
        $floatLat = (float)$lat;
        $floatLng = (float)$lng;

        // 半径(正方形)5kmあたりの緯度経度を計算（config/const.phpから5kmあたりの緯度経度の値をもってくる）
        $maxLat = $floatLat + (config('const.latPer5Km'));
        $minLat = $floatLat - (config('const.latPer5Km'));
        $maxLng = $floatLng + (config('const.lngPer5Km'));
        $minLng = $floatLng - (config('const.lngPer5Km'));

        // $dateに値があったらその値から検索、なかったら今日の日付から検索
        if (!empty($date)) {
            $query->where('date', $date);
        } else {
            $query->where('date', Carbon::today()->format('Y-m-d'));
        }

        // $freewordに値があったらその値を全カラムから検索、なかったら指定しない
        // \DB::raw() クエリの中でSQLを直接使用できる
        if (!empty($freeword)) {
            $query->where(\DB::raw('concat(title,date,venue,category,artist)'), 'like', '%' . $freeword . '%');
        }

        // $categoryに値があったら、その値を検索、なかったら全カテゴリーから検索
        if (!empty($category)) {
            $query->where('category', 'like', '%' . $category . '%');
        }
        if (!empty($lat)) {
            $query->whereBetween('lat', [$minLat, $maxLat]);
        }
        if (!empty($lng)) {
            $query->whereBetween('lng', [$minLng, $maxLng]);
        }

        // debug機能 storage/logsの中に吐き出される
        $search_sql = $query->toSql();
        Log::debug('$search_sql="' . $search_sql . '""');

        $lives = $query->get();

        // $livesをlives.resultで表示
        return view('lives.result', [
            // 検索結果のlivesをbladeへ渡す
            'lives' => $lives,
            // 現在地緯度latをbladeへ渡す
            'lat' => $lat,
            // 現在地経度lngをbladeへ渡す
            'lng' => $lng,
            // 検索条件に使った日にちを次の詳細検索ページでも引き継いで表示させるため
            // ここで得たdateを渡す
            'date' => $date,
        ]);
    }
}
