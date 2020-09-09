@extends('layouts.app')
@section('headerText')
    ライブ一覧
@endsection

@section('content')
<!-- Start Sample Area -->
    <div class="container box_1170">
        <div class="row justify-content-center">
        <!--チェックをつけたライブの削除-->
        {!! Form::model($lives, ['route' => ['lives.destroy'], 'method' => 'delete']) !!}
        {!! Form::submit('チェックを入れたライブを削除する', ['class' => 'btn btn-danger']) !!}
        {!! link_to_route('lives.create', '新規ライブの作成', [], ['class' => 'btn btn-primary']) !!}
        @if (count($lives) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>id</th>
                <th>title</th>
                <th>日にち</th>
                <th>会場</th>
                <th>カテゴリー</th>
                <th>アーティスト</th>
                <th>Min_fee</th>
                <th>Max_fee</th>
                <th>作成したuser_id</th>
                <th>ライブイメージ</th>
                <th>更新日</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($lives as $live)
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{ $live->id }}"></td>
                <td>{{ $live->id }}</td>
                <td>{!! link_to_route('lives.show', $live->title, ['live' => $live->id]) !!}</td>
                <td>{{ $live->date }}</td>
                <td>{{ $live->venue }}</td>
                <td>{{ $live->category }}</td>
                <td>{{ $live->artist }}</td>
                <td>{{ $live->min_price }}</td>
                <td>{{ $live->max_price }}</td>
                <td>{{ $live->user_id }}</td>
                <td>
                    @if($live->live_image === null)
                    <img src="/storage/defaultLiveImage.jpg" width="100px" height="100px">
                    @else
                    <img src="{{ Storage::disk('s3')->url($live->live_image)}}" width="100px" height="100px">
                    @endif
                </td>
<!--                <td>{{ $live->live_image }}</td>-->
                <td>{{ $live->updated_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        {!! Form::close() !!}
    </div>
    </div>
    </div>
</div>

<!---->
<!---->
<!--<div class="slider-area hero-overly">-->
<!--    <div class="single-slider hero-overly  slider-height d-flex align-items-center">-->
<!--        <div class="container">-->
<!--            <div class="row justify-content-center">-->
<!--                <h1></br></br></br>ライブ一覧</h1>-->
<!--                チェックをつけたライブの削除-->
<!--                {!! Form::model($lives, ['route' => ['lives.destroy'], 'method' => 'delete']) !!}-->
<!--                {!! Form::submit('チェックを入れたライブを削除する', ['class' => 'btn btn-danger']) !!}-->
<!---->
<!--                {!! link_to_route('lives.create', '新規ライブの作成', [], ['class' => 'btn btn-primary']) !!}-->
<!---->
<!--                @if (count($lives) > 0)-->
<!--                <table class="table table-striped">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th></th>-->
<!--                        <th>id</th>-->
<!--                        <th>title</th>-->
<!--                        <th>日にち</th>-->
<!--                        <th>会場</th>-->
<!--                        <th>カテゴリー</th>-->
<!--                        <th>アーティスト</th>-->
<!--                        <th>チケット最低値</th>-->
<!--                        <th>チケット最高値</th>-->
<!--                        <th>公式URL</th>-->
<!--                        <th>作成したuser_id</th>-->
<!--                        <th>ライブイメージ</th>-->
<!--                        <th>更新日</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    @foreach ($lives as $live)-->
<!--                    <tr>-->
<!--                        <td><input type="checkbox" name="ids[]" value="{{ $live->id }}"></td>-->
<!--                        <td>{!! link_to_route('lives.show', $live->id, ['live' => $live->id]) !!}</td>>-->
<!--                        <td>{{ $live->title }}</td>-->
<!--                        <td>{{ $live->date }}</td>-->
<!--                        <td>{{ $live->venue }}</td>-->
<!--                        <td>{{ $live->category }}</td>-->
<!--                        <td>{{ $live->artist }}</td>-->
<!--                        <td>{{ $live->min_price }}</td>-->
<!--                        <td>{{ $live->max_price }}</td>-->
<!--                        <td>{{ $live->url }}</td>-->
<!--                        <td>{{ $live->user_id }}</td>-->
<!--                        <td>{{ $live->live_image }}</td>-->
<!--                        <td>{{ $live->updated_at }}</td>-->
<!--                    </tr>-->
<!--                    @endforeach-->
<!--                    </tbody>-->
<!--                </table>-->
<!--                @endif-->
<!--                {!! Form::close() !!}-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


@endsection
