@extends('layouts.app')

@section('content')
            <h1>今日のライブ</h1>
            <div id="map" style="height:500px"></div>

            <table>
                <tr><th>緯度</th><td id="table_lat"></td></tr>
                <tr><th>経度</th><td id="table_lon"></td></tr>
            </table>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
    <script src="{{ asset('/js/result.js') }}"></script>
@endsection
