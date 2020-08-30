
// googleMapを持ってくるときに,callback=initMapと記述しているため、initMapを作成
function initMap(){

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
        // iconをデフォルトのものから、storage/app/publicに格納した画像へ変更した
        icon: "/storage/icon.png",
        // マーカーのラベルを作成
        label:{
            fontFamily: 'sans-serif',
            fontSize: '20px',
            fontWeight: '200',
            text: "I'm here",
        }
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
        //マーカーをクリックしたとき※addEventListnerはgoogleMapでは使えない
        marker[i].addListener('click', function (e) {
            // =以降、URLを指定する、 lives/live(各ライブid)　へ遷移　lives/1とか
            window.location = `/lives/${live.id}`
        });
    }
}


// エラー時に呼び出される関数
// function showErr(err){
//     switch(err.code){
//         case 1 : alert("位置情報の利用が許可されていません"); break;
//         case 2 : alert("デバイスの位置が判定できません"); break;
//         case 3 : alert("タイムアウトしました"); break;
//         default : alert(err.message);
//     }
// }
//
// // geolocation に対応しているか否かを確認
// if("geolocation" in navigator){
//     var opt = {
//         "enableHighAccuracy": true,
//         "timeout": 10000,
//         "maximumAge": 0,
//     };
//     navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
// }else{
//     alert("ブラウザが位置情報取得に対応していません");
// }
//

