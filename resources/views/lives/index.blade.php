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
                <th>イメージ</th>
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
                <td>{{ $live->min_fee }}</td>
                <td>{{ $live->max_fee }}</td>
                <td>{{ $live->user_id }}</td>
                <!--live_imageに何も保存されていなかったらデフォルト画像を表示-->
                <!--デフォルト画像はpublic/imagesに保存するが、呼び出すときは/images /はpublicの意味-->
                <td>
                    @if($live->live_image === null)
                    <img src="{{ asset('/images/defaultLiveImage.jpg')}}" width="100px" height="100px">
                    @else
                    <img src="{{ Storage::disk('s3')->url($live->live_image)}}" width="100px" height="100px">
                    @endif
                </td>
                <td>{{ $live->updated_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        {!! Form::close() !!}
        {{ $lives->links() }}
    </div>
</div>
</div>
</div>


@endsection
