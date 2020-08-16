@extends('layouts.app')

@section('content')

    <h1>id = {{ $live->id }} のライブ詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $live->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $live->title }}</td>
        </tr>
    </table>
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('lives.edit', 'このライブを編集', ['live' => $live->id], ['class' => 'btn btn-light']) !!}

@endsection
