<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivesController extends Controller
{
    public function index(){

//        検索結果を$lives変数に代入
//        $lives = ->get()

//        $livesをlives.indexで表示
        return view('lives.index', [
//            'lives' => $lives,
        ]);


    }
}
