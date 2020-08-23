function getPosition() {
    navigator.geolocation.getCurrentPosition(success);
}

function success(pos) {
    var date = new Date(pos.timestamp);
    console.log('取得時間:' + date.toLocaleString());
    // 現在地の緯度
    let presentLocationLat = pos.coords.latitude;
    // 現在地の経度
    let presentLocationlng = pos.coords.longitude;

    console.log('緯度:' + presentLocationLat);
    console.log('経度:' + presentLocationlng);

}
