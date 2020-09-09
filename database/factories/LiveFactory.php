<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Live;
use Faker\Generator as Faker;
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
    return [
        'title' => $faker->word,//言葉
        'date' => $faker->date,//日にち
        'venue' => $faker->locale,//場所
        'category' => $faker->word,//言葉
        'artist' => $faker->name,//名前
        'min_price' => $faker->numberBetween(100,1000),//100から1000のランダムな数字
        'max_price' => $faker->numberBetween(1001,10000),//1001から10000のランダムな数字
        'url' => $faker->url,//url
        'lat' => $faker->latitude,//緯度
        'lng' => $faker->longitude,//経度
        'user_id' => $faker->numberBetween(1,2),//1か2の文字列
        'setlist' => $faker->word,//言葉
        'live_image'=>$faker->imageUrl($width = 640, $height = 480, $category = 'cats', $randomize = true, $word = null),

    ];
});
