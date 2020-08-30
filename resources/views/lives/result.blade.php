@extends('layouts.app')

@section('content')
            <h1>今日のライブ</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-8" id="map" style="height:500px"></div>
                    <div class="col-md-4">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>title</th>
                                <th>アーティスト</th>
                                <th>会場</th>
                                <th>日にち</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lives as $live)
                                <tr>
                                    <td>{!! link_to_route('lives.show', $live->title, ['live' => $live->id]) !!}</td>
                                    <td>{{ $live->artist }}</td>
                                    <td>{{ $live->venue }}</td>
                                    <td>{{ $live->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>もう一度検索する</h2>
                        {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}

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

                        {!! Form::submit('検索',['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script>
        // result.jsで使用するvar livesに、controllerで定義した$livesの各要素を配列にして、json形式にし、result.jsに渡す
        var lives = @json($lives->toArray());
    </script>
    <script src="{{ asset('/js/result.js') }}"></script>
@endsection
