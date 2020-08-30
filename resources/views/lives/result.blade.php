@extends('layouts.app')

@section('content')
            <h1>今日のライブ</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-8" id="map" style="height:500px"></div>
                    <div class="offset-md-1 col-md-3">
                        {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}

                        <div class="form-group row">
                            {!! Form::label('freeword', 'フリーワード:') !!}
                            {!! Form::text('freeword', old('title'), ['class' => 'form-control','placeholder' => 'フリーワード']) !!}
                        </div>

                        <div class="form-group row">
                            {!! Form::label('date', '日にち:',['class'=>"col-form-label date"]) !!}
                            {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>

                        {{--            デフォルトで現在地を選択した状態で検索する--}}
                        <div class="form-group row">
                            {!! Form::label('location', '場所:',['class'=>"col-form-label"]) !!}
                            {!! Form::text('location', old('location'), ['class' => 'form-control' ,'placeholder' => '現在地周辺']) !!}
                        </div>

                        {{--            デフォルトで全カテゴリーを設定した状態で検索する--}}
                        <div class="form-group row">
                            {!! Form::label('category', 'カテゴリー:',['class'=>"col-form-label"]) !!}
                            {!! Form::select('category', ['ロック','ポップス','パンク'] ,old('category'), ['class' => 'form-control' ,'placeholder' => 'すべてのカテゴリー']) !!}
                        </div>

                        {!! Form::submit('検索',['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}</div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>title</th>
                    <th>日にち</th>
                    <th>会場</th>
                    <th>アーティスト</th>
                    <th>チケット最低値</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lives as $live)
                    <tr>
                        <td>{!! link_to_route('lives.show', $live->title, ['live' => $live->id]) !!}</td>
                        <td>{{ $live->date }}</td>
                        <td>{{ $live->venue }}</td>
                        <td>{{ $live->artist }}</td>
                        <td>{{ $live->min_price }}
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--緯度経度の表示は必要ないためコメント--}}
{{--            <table>--}}
{{--                <tr><th>緯度</th><td id="table_lat"></td></tr>--}}
{{--                <tr><th>経度</th><td id="table_lng"></td></tr>--}}
{{--            </table>--}}
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script>
        // result.jsで使用するvar livesに、controllerで定義した$livesの各要素を配列にして、json形式にし、result.jsに渡す
        var lives = @json($lives->toArray());
    </script>
    <script src="{{ asset('/js/result.js') }}"></script>
@endsection
