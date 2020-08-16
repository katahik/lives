@extends('layouts.app')

@section('content')

<h1>ライブ一覧</h1>

<!--この画面内にて、チェックをつけたライブの削除ができるように-->

@if (count($lives) > 0)
<table class="table table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>メッセージ</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lives as $live)
    <tr>
        <td>{!! link_to_route('lives.show', $live->id, ['live' => $live->id]) !!}</td>>
        <td>{{ $live->title }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif

{{-- メッセージ作成ページへのリンク --}}
{!! link_to_route('lives.create', '新規ライブの作成', [], ['class' => 'btn btn-primary']) !!}

@endsection
