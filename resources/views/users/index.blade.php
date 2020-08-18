@extends('layouts.app')

@section('content')
    <h1>ユーザー一覧</h1>
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

@endsection
