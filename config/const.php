<?php
//このファイル内に定義したものはどこからでも呼び出すことができる

return [
//緯度 0.0090133729745762/km
'latPerKm' => 0.0090133729745762,

//経度 0.010966404715491394/km
'lngPerKm' => 0.010966404715491394,


];


//書き方
//return [
//
//    'BASE_URL' => 'https://example.com',
//
//    'DIRECTRY_NAME' => ['/aaa', '/bbb', '/ccc'],
//
//    'APP_SETTING' => [
//        'user' => 'hogehoge',
//        'password' => '123456'
//    ],
//];
//呼び出し方
//config('const.BASE_URL'); // https://example.com
//config('const.DIRECTRY_NAME.0'); // /aaa
//config('const.DIRECTRY_NAME')[0]; // /aaa
//config('const.APP_SETTING.user'); // hogehoge
//config('const.APP_SETTING')['user']; // hogehoge
