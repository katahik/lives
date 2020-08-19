@extends('layouts.app')

@section('content')

    <h1>ライブ新規作成ページ</h1>

    <div class="row">
        <div class="col-12">
            {!! Form::model($live, ['route' => 'lives.store']) !!}

            <div class="form-group row">
                {!! Form::label('title', 'ライブ名:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('title', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
{{--                カレンダーを表示させること--}}
                {!! Form::label('date', '日時:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('date', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('venue', '会場:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('venue', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('category', 'カテゴリー:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('category', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('artist', 'アーティスト:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('artist', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('min_price', 'チケット最低値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('min_price', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('max_price', 'チケット最高値:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('max_price', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('url', 'URL:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('url', null, ['class' => 'col-10 form-control']) !!}
            </div>
            <div class="form-group row">
                {!! Form::label('live_image', 'イメージ:',['class'=>"col-2 col-form-label"]) !!}
                {!! Form::text('live_image', null, ['class' => 'col-10 form-control']) !!}
            </div>


            {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
