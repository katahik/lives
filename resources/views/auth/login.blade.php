@extends('layouts.top')

@section('content')
    <div class="slider-area hero-overly">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center">
            <div class="container">
                <div class="text-center">
                    <br><br><br><br><br>
                    <h5>ログインすると、「行ったライブ」機能で、行ったライブを簡単に思い出すことができます。</h5>
                    <h1>Log in</h1>
                </div>

                <div class="row">
                    <div class="col-sm-6 offset-sm-3">

                        {!! Form::open(['route' => 'login']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}

                        {{-- ユーザ登録ページへのリンク --}}
                        <p class="mt-2">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
