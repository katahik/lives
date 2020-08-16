<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ログインしなくても見れる群

//トップページ
Route::get('/', function () {
    return view('welcome');
});

//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//結果の表示
Route::get('result','LivesController@result')->name('lives.result');


//ログイン中の一般ユーザーが見れる群

Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    // 行ったライブ
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});


// 主催者以上が見れる群

Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
//    自分が作成したライブのみ編集できる
    Route::resource('lives', 'LivesController');
});

// 管理者しか見れない群

Route::group(['middleware' => ['auth', 'can:system-only']], function () {
//    ユーザーの一覧表示と削除
    Route::resource('users', 'UsersController', ['only' => ['index','destroy']]);
});

Auth::routes();
