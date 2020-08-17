@extends('layouts.app')

@section('content')
    <h1>ユーザー一覧</h1>
<form method="POST" action="destroy">
    <input type="submit" class="btn btn-danger" value="チェックを付けたユーザーを削除する">
    @csrf
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
        @foreach ($users as $user)
        <tr>
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
</form>

@endsection
