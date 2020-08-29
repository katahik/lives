@extends('layouts.app')

@section('content')

    <h1>ライブ新規作成ページ</h1>

    <div class="row">
        <div class="col-12">
{{--   'files' => trueを記入することでフォームにenctype="multipart/form-data"属性が付与--}}
            {!! Form::model($live, ['route' => 'lives.store','files' => true]) !!}
            {{Form::token()}}

            <div class="form-group row">
                {!! Form::label('title', 'ライブ名:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('title', old('title'), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {{--                カレンダーを表示させること→実装--}}
                {!! Form::label('date', '日にち:',['class'=>"col-2 col-form-label date"]) !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('venue', '会場:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('venue', old('venue'), ['class' => 'col-10 form-control']) !!}
            </div>

{{--            緯度経度を直接打ち込むのでなく、住所を入力したら、緯度経度を保存できるようにする--}}
            <div class="form-group row">
                {!! Form::label('address', '会場住所:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('address',  old('address'), ['class' => 'col-10 form-control','id'=>'addressInput']) !!}
            </div>
            <div id="searchGeo" class="btn btn-primary">緯度経度変換</div>
            {{--            緯度経度を直接打ち込むのでなく、住所を入力したら、緯度経度を保存できるようにする--}}
            <div class="form-group row">
                {!! Form::label('lat', '緯度:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('lat', old('lat'), ['class' => 'col-10 form-control','id'=>"lat"]) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('lng', '経度:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('lng', old('lng'), ['class' => 'col-10 form-control','id'=>"lng"]) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('category', old('category'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('artist', 'アーティスト:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('artist', old('artist'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('min_price', 'チケット最低値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('min_price', old('min_price'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('max_price', 'チケット最高値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('max_price', old('max_price'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('url', 'URL:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('url', old('url'), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('live_image', 'イメージ:',['class'=>"col-2 col-form-label"]) !!}
{{--                {!! Form::file('liveImage') !!}--}}
                {!! Form::text('live_image', old('live_image'), ['class' => 'col-10 form-control']) !!}
            </div>


            {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/getLatLng.js') }}"></script>
@endsection
