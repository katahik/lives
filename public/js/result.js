function setLocation(pos){

    // 緯度・経度を取得
    lat = pos.coords.latitude;
    lng = pos.coords.longitude;

    // 緯度・経度を表示
    document.getElementById("table_lat").innerHTML = lat;
    document.getElementById("table_lng").innerHTML = lng;

    // google map へ表示するための設定
    latlng = new google.maps.LatLng(lat,lng);
    map = document.getElementById("map");
    opt = {
        zoom: 17,
        center: latlng,
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
        position: latlng,
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
