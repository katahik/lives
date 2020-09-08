@extends('layouts.app')
@section('headerText')
    ユーザー一覧
@endsection
@section('content')
<!--<div class="slider-area hero-overly">-->
<!--    <div class="single-slider hero-overly  slider-height d-flex align-items-center">-->
<!--        <div class="container">-->
            {!! Form::model($users, ['route' => ['users.destroy'], 'method' => 'delete']) !!}
            {!! Form::submit('チェックを入れたユーザーを削除する', ['class' => 'btn btn-danger']) !!}

                @if (count($users) > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>name</th>
                        <th>mail</th>
                        <th>pass</th>
                        <th>role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach ($users as $user)
                        <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            {!! Form::close() !!}
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

@endsection
