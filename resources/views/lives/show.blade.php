@extends('layouts.app')

@section('content')

{{--    トップに画像を出す--}}
@if($live->live_image === null)
{{--ライブイメージが格納されていない場合--}}
{{--予め設定していたデフォルトの画像を表示--}}
    <img src="/storage/defaultLiveImage.jpg" width="200px" height="200px">
@else
    <img src="{{ Storage::disk('s3')->url($live->live_image)}}" width="200px" height="200px">
@endif
    <h1>{{ $live->title }} の詳細</h1>

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
            <th>カテゴリー</th>
            <td>{{ $live->category }}</td>
        </tr>
        <tr>
            <th>アーティスト</th>
            <td>{{ $live->artist }}</td>
        </tr>
        <tr>
            <th>チケット最低値</th>
            <td>{{ $live->min_price }}</td>
        </tr>
        <tr>
            <th>チケット最高値</th>
            <td>{{ $live->max_price }}</td>
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

    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('lives.edit', 'このライブを編集', ['live' => $live->id], ['class' => 'btn btn-light']) !!}
@endsection
