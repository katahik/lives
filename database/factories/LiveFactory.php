<?php

/** @var Factory $factory */

use App\Live;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Live::class, function (Faker $faker) {
    // 直接randomElementに書き込んだらエラーがでたため、変数に入れる
    $randomCategory = array("ポップス", "ロック", "ヒップホップ", "レゲエ", "ジャズ", "パンク", "テクノ", "ハウス", "R&B", "");
    return [
        'title' => $faker->word,//言葉
        //今日から2週間後までのランダムな日付時刻
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),//日にち
        'venue' => $faker->locale,//場所
        'address' => $faker->address,//住所
        'category' => $faker->randomElement($randomCategory),//カテゴリー候補からランダムに選択
        'artist' => $faker->name,//名前
        'min_fee' => $faker->numberBetween(0, 1000),//0から1000のランダムな数字
        'max_fee' => $faker->numberBetween(1001, 10000),//1001から10000のランダムな数字
        'url' => $faker->url,//url
        'lat' => $faker->latitude,//緯度
        'lng' => $faker->longitude,//経度
        'user_id' => $faker->numberBetween(1, 2, 3),//1か2か3の数値
        'setlist' => $faker->word,//言葉
    ];
});
