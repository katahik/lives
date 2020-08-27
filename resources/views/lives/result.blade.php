@extends('layouts.app')

@section('content')
            <h1>今日のライブ</h1>
            <div id="map" style="height:500px"></div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>title</th>
                    <th>日にち</th>
                    <th>会場</th>
                    <th>アーティスト</th>
                    <th>チケット最低値</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lives as $live)
                    <tr>
                        <td>{{ $live->title }}</td>
                        <td>{{ $live->date }}</td>
                        <td>{{ $live->venue }}</td>
                        <td>{{ $live->artist }}</td>
                        <td>{{ $live->min_price }}
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table>
                <tr><th>緯度</th><td id="table_lat"></td></tr>
                <tr><th>経度</th><td id="table_lng"></td></tr>
            </table>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/result.js') }}"></script>
@endsection
