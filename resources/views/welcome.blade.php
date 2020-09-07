@extends('layouts.app')
@section('content')
    <div class="center">
    <h4 class="subheading">
        ふと、「音楽が聴きたい」と思ったことありませんか？</br>
    </h4>

        <div class="text-center" id="searchLives">
{{--            自分の位置情報と会場の位置情報で半径5kmのライブを検索する--}}
            {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}
{{--            隠しフォームでlivescontrollerに位置情報を渡す--}}
{{--            lat用--}}
            {!! Form::hidden('lat','lat',['id' => 'lat_id']) !!}
{{--            lng用--}}
            {!! Form::hidden('lng','lng',['id' => 'lng_id']) !!}

            {!! Form::submit("この周辺の今日のライブを探す", ['class' => "btn btn-success btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {!! Form::open(['route' => 'lives.result','method' => 'get']) !!}

            <div class="form-group row">
                {!! Form::label('freeword', 'フリーワード:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('freeword', old('title'), ['class' => 'col-10 form-control','placeholder' => 'フリーワード']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('date', '日にち:',['class'=>"col-2 col-form-label date"]) !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) !!}
            </div>

{{--            一旦場所は考えない--}}
            {{-- デフォルトで現在地を選択した状態で検索する--}}
{{--             <div class="form-group row">--}}
{{--             {!! Form::label('location', '場所:',['class'=>"col-2 col-form-label"]) !!}--}}
{{--             {!! Form::text('location', old('location'), ['class' => 'col-10 form-control' ,'placeholder' => '現在地周辺']) !!}--}}
{{--             </div>--}}
            {{--隠しフォームでlivescontrollerに位置情報を渡す--}}
            {{--lat用--}}
            {!! Form::hidden('lat','lat',['id' => 'lat_id']) !!}
            {{--lng用--}}
            {!! Form::hidden('lng','lng',['id' => 'lng_id']) !!}

            {{--デフォルトで全カテゴリーを設定した状態で検索する--}}
            <div class="form-group row">
                {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('category', old('category'), ['class' => 'col-10 form-control' ,'placeholder' => 'すべてのカテゴリー']) !!}
            </div>
        </div>
        <div class="col-6 search">
            {!! Form::submit('検索',['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
</div>

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/SetLocation.js') }}"></script>
@endsection

@endsection


