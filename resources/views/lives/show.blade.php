@extends('layouts.app')
@section('headerText')
    {{ $live->title }}
@endsection
@section('content')

    {{--    トップに画像を出す--}}
    @if($live->live_image === null)
        {{--ライブイメージが格納されていない場合--}}
        {{--予め設定していたデフォルトの画像を表示--}}
        <img src="{{ asset('/images/default_live_image.jpg')}}" width="200px" height="200px">
    @else
        <img src="{{ Storage::disk('s3')->url($live->live_image)}}" width="200px" height="200px">
    @endif
    <table class="table table-striped">
        <tr>
            <th>タイトル</th>
            <td>{{ $live->title }}</td>
        </tr>
        <tr>
            <th>日にち</th>
            <td>{{ $live->date }}</td>
        </tr>
        <tr>
            <th>会場</th>
            <td>{{ $live->venue }}</td>
        </tr>
        <tr>
            <th>会場住所</th>
            <td>{{ $live->address }}</td>
        </tr>
        <tr>
            <th>アーティスト</th>
            <td>{{ $live->artist }}</td>
        </tr>
        <tr>
            <th>カテゴリー</th>
            <td>{{ $live->category }}</td>
        </tr>
        <tr>
            <th>チケット最低値</th>
            <td>{{ $live->min_fee }}</td>
        </tr>
        <tr>
            <th>チケット最高値</th>
            <td>{{ $live->max_fee }}</td>
        </tr>
        <tr>
            <th>セットリスト</th>
            <td>{{ $live->setlist }}</td>
        </tr>
        <tr>
            <th>公式URL</th>
            <td>{{ $live->url }}</td>
        </tr>
    </table>

    <aside class="col-sm-4">
        {{-- going／ungoingボタン --}}
        @include('user_going.going_button')
    </aside>
    <br>

    @if (Auth::check())
        @can('system-only') {{-- システム管理者権限のみに表示される --}}
        {{-- メッセージ編集ページへのリンク --}}
        {!! link_to_route('lives.edit', 'このライブを編集', ['live' => $live->id], ['class' => 'btn btn-light']) !!}
        @endcan
    @elseif($userId === $live->user_id)
        {!! link_to_route('lives.edit', 'このライブを編集', ['live' => $live->id], ['class' => 'btn btn-light']) !!}
    @endif

@endsection
