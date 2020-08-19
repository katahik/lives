@extends('layouts.app')

@section('content')

<h1>ライブ一覧</h1>
{!! Form::model($lives, ['route' => ['lives.destroy'], 'method' => 'delete']) !!}
{!! Form::submit('チェックを入れたライブを削除する', ['class' => 'btn btn-danger']) !!}

<!--この画面内にて、チェックをつけたライブの削除ができるように-->
{!! link_to_route('lives.create', '新規ライブの作成', [], ['class' => 'btn btn-primary']) !!}


@if (count($lives) > 0)
<table class="table table-striped">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>title</th>
        <th>日時</th>
        <th>会場</th>
        <th>カテゴリー</th>
        <th>アーティスト</th>
        <th>チケット最低値</th>
        <th>チケット最高値</th>
        <th>公式URL</th>
        <th>作成したuser_id</th>
<!--        ここで小さくサムネイル画像をだす-->
        <th>ライブイメージ</th>
        <th>更新日</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lives as $live)
    <tr>
        <td><input type="checkbox" name="ids[]" value="{{ $live->id }}"></td>
        <td>{!! link_to_route('lives.show', $live->id, ['live' => $live->id]) !!}</td>>
        <td>{{ $live->title }}</td>
        <td>{{ $live->date }}</td>
        <td>{{ $live->venue }}</td>
        <td>{{ $live->category }}</td>
        <td>{{ $live->artist }}</td>
        <td>{{ $live->min_price }}</td>
        <td>{{ $live->max_price }}</td>
        <td>{{ $live->url }}</td>
        <td>{{ $live->user_id }}</td>
        <td>{{ $live->live_image }}</td>
        <td>{{ $live->updated_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
{!! Form::close() !!}


@endsection
