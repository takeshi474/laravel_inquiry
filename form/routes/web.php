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
// お問い合わせトップページ
Route::get('/', 'ContactController@create') -> name('create');
// 投稿内容を確認画面に表示
Route::post('/confirm', 'ContactController@confirm') -> name('confirm');
// お問い合わせありがとうページに移動
Route::post('/send', 'ContactController@send') -> name('thanks');
// Slack通知
Route::get('/slackTest', function (){
  (new \App\Services\SlackService()) -> send();
});
// メール
Route::get('mail','Mailcontroller@index');
Route::post('mail','Mailcontroller@sendmail');
// CSV
Route::get('/sample', 'SampleController@index') -> name('index.sample');
Route::get('/sample/export{keyword?}', 'SampleController@export') -> name('export.sample');

Route::resource('/upload', 'UploadController');
