@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            ユーザー情報
        </div>
        <div class="card-body">
        <div class="row">
            <label class="col-2"><i class="far fa-user"></i></label>
            <div class="col-10">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
        </div>

        <div class="row">
            <label class="col-2"><i class="far fa-envelope"></i></label>
            <div class="col-10">
                <h3 class="card-title">{{ $user->email }}</h3>
            </div>
        </div>
        </div>
    </div>
    <h2>行ったライブ</h2>
    @if (count($wentLives) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ライブ名</th>
                    <th>日にち</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($wentLives as $wentLive)
            <tr>
                <td>{!! link_to_route('lives.show', $wentLive->title, ['live' => $wentLive->id]) !!}</td>>
                <td>{{ $wentLive->date }}</td>
            </tr>
            @endforeach
    @endif
        <table class="table table-bordered">

            {{--URLにクエリストリングで翌月のパラメーターを付与--}}
            {{-- ->copy()としないと$firstDayそのものの値が変わってしまうから--}}
            <!--formatにてyear(month)のクエリストリングにcontrollerから渡ってきた、$firstDayのY(n)のみをformatメソッドで抽出した-->
            {{--addMonthメソッドはCarbonのインスタンスに1か月をプラスするメソッド->'year'の方でもこのメソッドを入れることで、12月になったら翌年になる--}}
            {!! link_to_route('users.show','<', ['user' => $user->id,'year'=>$firstDay->copy()->subMonth()->format('Y'),'month'=>$firstDay->copy()->subMonth()->format('n')]) !!}
            <p>{{ $firstDay->copy()->format('Y-n') }}</p>
            {!! link_to_route('users.show','>', ['user' => $user->id,'year'=>$firstDay->copy()->addMonth()->format('Y'),'month'=>$firstDay->copy()->addMonth()->format('n')]) !!}

            {{--表を作成する際には<tr>～</tr>で表の横部分を指定し、その中に<th>～</th>や<td>～</td>で表題や縦軸を指定してセルを定義--}}
            <thead>
            <tr>
                @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                    <th>{{ $dayOfWeek }}</th>
                @endforeach
            </tr>
            </thead>

            <tbody>
            @foreach ($dates as $date)
                {{--$dateが0(日曜日)である場合,行を新たに始める--}}
                {{--dayOfWeek 週のうちの何日目か 0 (日曜)から 6 (土曜)--}}
                @if ($date->dayOfWeek == 0)
                {{--「table row」の略で表の行部分（横方向）を指定するタグ <tr>～</tr>で表の横部分を指定--}}
                    <tr>
                @endif

                {{--「table data」の略で、テーブルセルの内容を指定--}}
                <td
                    {{--$date->monthで一つ一つの$date内に入っている日付の月と現在の月が違う場合,背景をグレーに--}}
                    {{--date('m')にて現在の月を取得--}}
                    @if ($date->month != $firstDay->copy()->format('n'))
                        class="bg-secondary"
                    @endif
                >
                    @if($date->copy()->format('Y-n-d') === $wentLive->date )
                        {{ $date->day }}
                        {{ $wentLive->title }}
                    @else
                        {{ $date->day }}
                    @endif
                </td>
                {{--$dateが6(日曜日)である場合、行を閉じて改行する--}}
                @if ($date->dayOfWeek == 6)
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
@endsection
