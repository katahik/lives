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
            <p>{{ date('m') }}</p>
            {{$value}}
{{--            ここで前月、翌月の文字で移動できるようにする--}}
            {!! link_to_route('users.show','>', ['user' => $user->id,'year'=>date('Y'),'month'=>date('m')]) !!}
            <thead>
            <tr>
                @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                    <th>{{ $dayOfWeek }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($dates as $date)
                @if ($date->dayOfWeek == 0)
                    <tr>
                        @endif
                        <td
                            @if ($date->month != date('m'))
                            class="bg-secondary"
                            @endif
                        >
                            {{ $date->day }}
                        </td>
                        @if ($date->dayOfWeek == 6)
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
@endsection
