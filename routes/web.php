<?php
// {any}を設定することで”/”(ルート)以下へのアクセスを行うとwelcome.blade.phpファイルが表示される設定を行っています。
// しかし{any}だけでは”/”(ルート)へのアクセスがあるとNot Foundエラーが発生します。
// そのため、where(‘any’,’.*’)も必要になります。
// .*は正規表現で0文字以上の任意の文字列を意味します。0文字なので
// ”/”(ルート)や”/”(ルート)以下のどの場所にアクセスしてもwelcome.blade.phpの中身が表示されます。
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
