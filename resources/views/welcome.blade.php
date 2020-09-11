@extends('layouts.top')
    @section('content')

    <!-- Hero Area Start-->
    <div class="slider-area hero-overly">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <!-- Hero Caption -->
                        <div class="hero__caption">
                            <span>Bathe in music</span>
{{--                            Bathe in music 音楽を浴びる--}}
{{--                            ボツ ふと、「音楽が聴きたい」と思ったことありませんか？--}}
                            <h1>Lives</h1>
                        </div>

                        <!--Hero form -->
                        <div class="center">
                            <div class="text-center" id="searchLives">
                                {{--            自分の位置情報と会場の位置情報で半径5kmのライブを検索する--}}
                                {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}
                                {{--            隠しフォームでlivescontrollerに位置情報を渡す--}}
                                {{--            lat用--}}
                                {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
                                {{--            lng用--}}
                                {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
{{--                                setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
{{--                                その後、disableはfalseになるようにsetlocation.js内に記述した--}}
                                {!! Form::submit("さっそく、この周辺の今日のライブを探す", ['class' => "btn btn-success btn-block",'disabled']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <br><br>
                                <h4>詳細検索</h4>
                                {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}

                                <div class="form-group row">
                                    {!! Form::label('freeword', 'フリーワード:',['class'=>"col-md-2 col-form-label"]) !!}
                                    {!! Form::text('freeword', old('title'), ['class' => 'col-md-10 form-control','placeholder' => 'フリーワード']) !!}
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('date', '日にち:',['class'=>"col-md-2 col-form-label date"]) !!}
                                    {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-md-10 form-control']) !!}
                                </div>

                                {{--            一旦場所は考えない--}}
                                {{-- デフォルトで現在地を選択した状態で検索する--}}
                                {{--             <div class="form-group row">--}}
                                {{--             {!! Form::label('location', '場所:',['class'=>"col-2 col-form-label"]) !!}--}}
                                {{--             {!! Form::text('location', old('location'), ['class' => 'col-10 form-control' ,'placeholder' => '現在地周辺']) !!}--}}
                                {{--             </div>--}}
                                {{--隠しフォームでlivescontrollerに位置情報を渡す--}}
                                {{--lat用--}}
                                {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
                                {{--lng用--}}
                                {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}

                                {{--デフォルトで全カテゴリーを設定した状態で検索する--}}
                                <div class="form-group row">
                                    {!! Form::label('category', 'カテゴリー:',['class'=>"col-md-2 col-form-label"]) !!}
                                    {!! Form::select('category',
                                        ['ポップス' => 'ポップス', 'ロック' => 'ロック', 'ヒップホップ' => 'ヒップホップ',
                                         'レゲエ' => 'レゲエ','ジャズ' => 'ジャズ','パンク' => 'パンク','テクノ' => 'テクノ',
                                         'ハウス' => 'ハウス','R&B' => 'R&B'
                                         ] ,
                                        old('category'), ['class' => 'col-md-10 form-control' ,'placeholder' => 'すべてのカテゴリー']) !!}
                                </div>
                            </div>
                            <div class="col-12 search">
                                {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
                                {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
                                <div class="btn-wrapper">
                                    {!! Form::submit('検索',['class' => 'btn btn-primary','disabled']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script src="{{ asset('/js/SetLocation.js') }}"></script>
@endsection



