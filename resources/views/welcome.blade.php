@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
{{--            自分の位置情報と会場の位置情報で半径3kmのライブを検索する--}}
            {!! Form::open(['route' => 'lives.result']) !!}
            {!! Form::submit('この周辺の今日のライブを探す', ['class' => "btn btn-success btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            {!! Form::open(['route' => 'lives.result']) !!}

            <div class="form-group row">
                {!! Form::label('freeword', 'フリーワード:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('freeword', old('title'), ['class' => 'col-10 form-control','placeholder' => 'フリーワード']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('date', '日にち:',['class'=>"col-2 col-form-label date"]) !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) !!}
            </div>

{{--            デフォルトで現在地を選択した状態で検索する--}}
            <div class="form-group row">
                {!! Form::label('location', '場所:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('location', old('location'), ['class' => 'col-10 form-control' ,'placeholder' => '現在地周辺']) !!}
            </div>

{{--            デフォルトで全カテゴリーを設定した状態で検索する--}}
            <div class="form-group row">
                {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::select('category', ['ロック','ポップス','パンク'] ,old('category'), ['class' => 'col-10 form-control' ,'placeholder' => 'すべてのカテゴリー']) !!}
            </div>

            {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>



{{--    <div class="center jumbotron">--}}
{{--        <form>--}}
{{--            <div class="form-group input-group">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text"><i class="fas fa-search"></i></span>--}}
{{--                </div>--}}
{{--                <input type="text" class="form-control" placeholder="フリーワード">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <form>--}}
{{--            <div class="form-group input-group">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text">日にち</span>--}}
{{--                </div>--}}
{{--                カレンダーを表示させる--}}
{{--                <input type="text" class="form-control" placeholder="カレンダーを表示">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <form>--}}
{{--            <div class="form-group input-group">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text">場所</span>--}}
{{--                </div>--}}
{{--                デフォルトで現在地周辺を設定した状態で検索する--}}
{{--                <input type="text" class="form-control" placeholder="現在地周辺">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <form>--}}
{{--            <div class="form-group input-group">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text">カテゴリー</span>--}}
{{--                </div>--}}
{{--                デフォルトで全カテゴリーを設定した状態で検索する--}}
{{--                <div class="dropdown">--}}
{{--                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">--}}
{{--                        すべてのカテゴリー--}}
{{--                    </button>--}}
{{--                    <!-- 選択肢 -->--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <a class="dropdown-item" href="#">すべてのカテゴリー</a>--}}
{{--                        <a class="dropdown-item" href="#">ロック</a>--}}
{{--                        <a class="dropdown-item" href="#">ポップス</a>--}}
{{--                        <a class="dropdown-item" href="#">オルタナティブ</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <button class="btn btn-danger" type="submit">検索</button>--}}
{{--    </div>--}}
@endsection
