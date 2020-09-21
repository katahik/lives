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


Route::get('/', 'TopController@top');

//ゲストログイン機能ルート
Route::get('guest', 'Auth\LoginController@authenticate')->name('login.guest');

//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//結果の表示
Route::get('result', 'LivesController@result')->name('lives.result');


//ログイン中の一般ユーザーが見れる群

Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
//このグループ内のURLの最初に /users/{id}/を付与
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('going', 'GoingController@store')->name('going');
        Route::delete('ungoing', 'GoingController@destroy')->name('ungoing');
        Route::get('wentLive', 'UsersController@wentLive')->name('wentLive');
    });
    // 行ったライブ
    Route::get('users/{user}', 'UsersController@show')->name('users.show');
});


// 主催者以上が見れる群

Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
//    自分が作成したライブのみライブ一覧で出てくる
//    Route::resource('lives', 'LivesController');
    Route::resource('lives', 'LivesController', ['only' => ['index', 'store', 'create']]);
    Route::delete('lives', 'LivesController@destroy')->name('lives.destroy');
    Route::put('lives/{live}', 'LivesController@update')->name('lives.update');
    Route::get('lives/{live}/edit', 'LivesController@edit')->name('lives.edit');

});

// 管理者しか見れない群

Route::group(['middleware' => ['auth', 'can:system-only']], function () {
//    ユーザーの一覧表示と削除
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::delete('users', 'UsersController@destroy')->name('users.destroy');
});

Auth::routes();


//ライブの詳細
//なぜかcan:admin-higherの前にこの記述があるとcreateというライブをshowしようとするので、この位置に記述
Route::get('lives/{live}', 'LivesController@show')->name('lives.show');
