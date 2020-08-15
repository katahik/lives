@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
{{--            自分の位置情報と会場の位置情報で半径1kmのライブを検索する--}}
            <a href="#">この周辺の今日のライブを探す</a>
        </div>
    </div>
    <div class="center jumbotron">
        <form>
            <div class="form-group input-group">
                <!-- 左端につけるアクセサリ -->
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="フリーワード">
            </div>
        </form>
        <form>
            <div class="form-group input-group">
                <!-- 左端につけるアクセサリ -->
                <div class="input-group-prepend">
                    <span class="input-group-text">日にち</span>
                </div>
{{--                カレンダーを表示させる--}}
                <input type="text" class="form-control" placeholder="カレンダーを表示">
            </div>
        </form>
        <form>
            <div class="form-group input-group">
                <!-- 左端につけるアクセサリ -->
                <div class="input-group-prepend">
                    <span class="input-group-text">場所</span>
                </div>
{{--                デフォルトで現在地周辺を設定した状態で検索する--}}
                <input type="text" class="form-control" placeholder="現在地周辺">
            </div>
        </form>
        <form>
            <div class="form-group input-group">
                <!-- 左端につけるアクセサリ -->
                <div class="input-group-prepend">
                    <span class="input-group-text">カテゴリー</span>
                </div>
{{--                デフォルトで全カテゴリーを設定した状態で検索する--}}
                <div class="dropdown">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        すべてのカテゴリー
                    </button>
                    <!-- 選択肢 -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">すべてのカテゴリー</a>
                        <a class="dropdown-item" href="#">ロック</a>
                        <a class="dropdown-item" href="#">ポップス</a>
                        <a class="dropdown-item" href="#">オルタナティブ</a>
                    </div>
                </div>
            </div>
        </form>
        <button class="btn btn-danger" type="submit">検索</button>
    </div>
@endsection
