<?php

namespace App\Utils;


class CalcDistance
{
    /**
     * ２地点間の距離を求める
     *   GoogleMapAPIのgeometory.computeDistanceBetweenのロジック
     *   浮動小数点の精度が足りないためGoogleより桁数が少ないかもしれません
     *
     * @param float $lat1 緯度１
     * @param float $lon1 経度１
     * @param float $lat2 緯度２
     * @param float $lon2 経度２
     * @return float 距離(m)
     */

    public static function google_distance($lat1, $lng1, $lat2, $lng2) {
        // 緯度経度をラジアンに変換
        $radLat1 = deg2rad($lat1); // 緯度１
        $radLng1 = deg2rad($lng1); // 経度１
        $radLat2 = deg2rad($lat2); // 緯度２
        $radLng2 = deg2rad($lng2); // 経度２

        $r = 6378137.0; // 赤道半径

        $averageLat = ($radLat1 - $radLat2) / 2;
        $averageLng = ($radLng1 - $radLng2) / 2;
        return $r * 2 * asin(sqrt(pow(sin($averageLat), 2) + cos($radLat1) * cos($radLat2) * pow(sin($averageLng), 2)));
    }
}
