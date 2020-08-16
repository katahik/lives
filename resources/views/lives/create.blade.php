@extends('layouts.app')

@section('content')

    <h1>ライブ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($live, ['route' => 'lives.store']) !!}

            <div class="form-group">
                {!! Form::label('title', 'live:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
