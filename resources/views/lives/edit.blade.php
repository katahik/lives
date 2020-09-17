@extends('layouts.app')
@section('content')
@section('headerText')
    {{ $live->title }} を編集する
@endsection
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            {{-- 'files' => trueを記入することでフォームにenctype="multipart/form-data"属性が付与--}}
            {{-- ※'files' => trueは、createの方では、route=[]内に書いたが、ここでは[]外に記入--}}
            {!! Form::model($live, ['route' => ['lives.update',$live->id ],'files' => true, 'method' => 'put']) !!}
            {{Form::token()}}

            <div class="form-group row">
                {!! Form::label('title', 'ライブ名:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('title', old('title'), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('date', '日にち:',['class'=>"col-2 col-form-label date"]) !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('venue', '会場:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('venue', old('venue'), ['class' => 'col-10 form-control']) !!}
            </div>

            {{--緯度経度を直接打ち込むのでなく、住所を入力したら、緯度経度を保存できるようにする--}}
            <div class="form-group row">
                {!! Form::label('address', '会場住所:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('address',  old('address'), ['class' => 'col-10 form-control','id'=>'addressInput']) !!}
            </div>
            <div id="searchGeo" class="btn btn-primary">緯度経度変換</div>
            <div class="form-group row">
                {!! Form::label('lat', '緯度:',['class'=>"col-2 col-form-label"]) !!}
                {{--第3引数に'readonly'を入れることで、ユーザーが直接緯度経度をいじれないようにする--}}
                {!! Form::text('lat', old('lat'), ['class' => 'col-10 form-control','id'=>"lat",'readonly']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('lng', '経度:',['class'=>"col-2 col-form-label"]) !!}
                {{--第3引数に'readonly'を入れることで、ユーザーが直接緯度経度をいじれないようにする--}}
                {!! Form::text('lng', old('lng'), ['class' => 'col-10 form-control','id'=>"lng",'readonly']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::select('category',
                                ['ポップス' => 'ポップス', 'ロック' => 'ロック', 'ヒップホップ' => 'ヒップホップ',
                                 'レゲエ' => 'レゲエ','ジャズ' => 'ジャズ','パンク' => 'パンク','テクノ' => 'テクノ',
                                 'ハウス' => 'ハウス','R&B' => 'R&B'
                                 ] ,
                                old('category'), ['class' => 'col-10 form-control' ,'placeholder' => 'カテゴリーを指定しない']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('artist', 'アーティスト:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('artist', old('artist'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('min_fee', 'チケット最低値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('min_fee', old('min_fee'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('max_fee', 'チケット最高値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('max_fee', old('max_fee'), ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('url', 'URL:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('url', old('url'), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('setlist', 'SETLIST:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('setlist', old('setlist'), ['class' => 'col-10 form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label('live_image', 'イメージ:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::file('liveImage') !!}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/getLatLng.js') }}"></script>
@endsection
