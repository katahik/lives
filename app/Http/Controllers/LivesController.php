<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Live;

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
//        ライブクラスのインスタンスを作成
        $live = new Live;
//      titleカラムにフォームの値を入れ込む
        $live->title = $request->title;

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
    public function destroy($id)
    {
        $live = Live::findOrFail($id);
        // メッセージを削除
        $live->delete();

        // トップページへリダイレクトさせる
        return redirect('lives');
    }
    public function result(){

//        検索結果を$lives変数に代入
//        $lives = ->get()

//        $livesをlives.resultで表示
        return view('lives.result', [
//            'lives' => $lives,
        ]);


    }
}
