<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Lives</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    </head>

    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>

            <h1>今日のライブ</h1>
            <div id="map" style="height:500px"></div>

            <table>
                <tr><th>緯度</th><td id="table_lat"></td></tr>
                <tr><th>経度</th><td id="table_lon"></td></tr>
            </table>

        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAvw2VOhcVODwrVjPHQ5Q0kGxWKICqx2QA&callback=initMap" async defer></script>
        <script>
            function setLocation(pos){

                // 緯度・経度を取得
                lat = pos.coords.latitude;
                lon = pos.coords.longitude;

                // 緯度・経度を表示
                document.getElementById("table_lat").innerHTML = lat;
                document.getElementById("table_lon").innerHTML = lon;

                // google map へ表示するための設定
                latlon = new google.maps.LatLng(lat,lon);
                map = document.getElementById("map");
                opt = {
                    zoom: 17,
                    center: latlon,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    scaleControl: true,
                    disableDoubleClickZoom: true,
                    draggable: false
                };

                // google map 表示
                mapObj = new google.maps.Map(map, opt);

                // マーカーを設定
                marker = new google.maps.Marker({
                    position: latlon,
                    map: mapObj
                });

            }

            // エラー時に呼び出される関数
            function showErr(err){
                switch(err.code){
                    case 1 : alert("位置情報の利用が許可されていません"); break;
                    case 2 : alert("デバイスの位置が判定できません"); break;
                    case 3 : alert("タイムアウトしました"); break;
                    default : alert(err.message);
                }
            }

            // geolocation に対応しているか否かを確認
            if("geolocation" in navigator){
                var opt = {
                    "enableHighAccuracy": true,
                    "timeout": 10000,
                    "maximumAge": 0,
                };
                navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
            }else{
                alert("ブラウザが位置情報取得に対応していません");
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
