
function getIdoKeido() {

    //入力した住所を取得します。
    var addressInput = document.getElementById('addressInput').value;
    console.log(addressInput);

    //Google Maps APIのジオコーダを使います。
    var geocoder = new google.maps.Geocoder();

    //ジオコーダのgeocodeを実行します。
    //第１引数のリクエストパラメータにaddressプロパティを設定します。
    //第２引数はコールバック関数です。取得結果を処理します。
    geocoder.geocode(
        {
            address: addressInput
        },
        function(results, status) {

            console.log(results, status)

            var idokeido = "";

            if (status == google.maps.GeocoderStatus.OK) {
                //取得が成功した場合

                //結果をループして取得します。
                for (var i in results) {
                    if (results[i].geometry) {

                        //緯度を取得します。
                        var lat = results[i].geometry.location.lat();
                        //経度を取得します。
                        var lng = results[i].geometry.location.lng();

                        console.log(lat);
                        console.log(lng);

                        $('#lat').val(lat);
                        $('#lng').val(lng);


                        break;
                    }
                }
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                alert("住所が見つかりませんでした。");
            } else if (status == google.maps.GeocoderStatus.ERROR) {
                alert("サーバ接続に失敗しました。");
            } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                alert("リクエストが無効でした。");
            } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                alert("リクエストの制限回数を超えました。");
            } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                alert("サービスが使えない状態でした。");
            } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                alert("原因不明のエラーが発生しました。");
            }


        });
}
$('#searchGeo').on('click',getIdoKeido);

//document.getElementById('searchGeo').on('click',getIdoKeido);
