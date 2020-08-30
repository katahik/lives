function setLocation(pos){

    // 緯度・経度を取得
    lat = pos.coords.latitude;
    lng = pos.coords.longitude;

    // //緯度経度の表示は必要ないためコメント
    // // 緯度・経度を表示
    // document.getElementById("table_lat").innerHTML = lat;
    // document.getElementById("table_lng").innerHTML = lng;

    // google map へ表示するための設定
    latlng = new google.maps.LatLng(lat,lng);
    map = document.getElementById("map");
    opt = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scaleControl: true,
        disableDoubleClickZoom: true,
        clickableIcons: false, //地図上のアイコンを押せないように
    };

    // google map 表示
    mapObj = new google.maps.Map(map, opt);

    // マーカーを設定
    marker = new google.maps.Marker({
        position: latlng,
        map: mapObj,
        title: '現在地',
    });

    // result.blade.phpから渡ってきたlivesを使用することができる
    // lives.lengthでは検索結果数をとる
    for (let i = 0 ; i < lives.length ; i++){

    // live = lives[i]ではそれぞれ[i]番目の値が入りループしていく
        live = lives[i];

        // 緯度経度データを作成
        // lat:には$livesのlatのi番目の緯度情報、lng:には$livesのlngのi番目の経度情報が入る
        markerLatLng = new google.maps.LatLng({lat:live.lat,lng:live.lng});
        // マーカーの追加
        marker[i] = new google.maps.Marker({
            position: markerLatLng,//マーカーの立てる位置は$livesのlat,lngを入れたmarkerLatLng
            map: mapObj,//マーカーを立てる地図を指定
            title:live.title,//ホバーしたときに$livesのtitleを表示させる
        })

        // ライブ位置情報のマーカーをクリックした際、ライブ詳細画面へ遷移
        //マーカーをクリックしたとき
        marker[i].addEventListener('click', function (e) {
            console.log('click');
        });


        // 以下参考コード
        // マーカーにクリックイベントを追加
        // function markerEvent(i) {
        //     marker[i].addListener('click', function() { // マーカーをクリックしたとき
        //         closeInfoWindow();
        //         infoWindow[i].open(map, marker[i]); // 吹き出しの表示
        //         //マーカー色変更
        //         changeIcon(i);
        //         //リストの色変更
        //         changeCurrent(i);
        //     });
        // }
    }
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


