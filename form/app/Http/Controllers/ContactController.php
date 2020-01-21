<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use App\Http\Requests\CreateContact;
use App\Http\Controllers\Controller;
use App\inquiry;
use App\Mail\SendGridSample;
use App\Services\Slack;
use Sichikawa\LaravelSendgridDriver\SendGrid;


class ContactController extends Controller
{
    public function create()
    {
      return view ('contact');
    }

    public function confirm(CreateContact $request)
    {
      // 投稿作成
      $inquiry = new inquiry();
      // 名前
      $inquiry -> name = $request -> name;
      // メール
      $inquiry -> email = $request -> email;
      // 問い合わせ内容
      $inquiry -> post = $request -> post;
      // セッションに保存
      $request -> session() -> put('inquiry', $inquiry);
      // 入力内容確認ページのviewに変数を渡して表示
      return view('confirm',['inquiry' => $inquiry]);
    }

    public function send(CreateContact $request)
    {
      // bladeのactionによって分岐
      $action = $request -> get('action','back');
      $inquiry = $request -> except('action');

      if($action === 'submit')
      {

        // フォームから受け取ったrequestの値を取得
        $inquiry = $request -> session() -> get('inquiry');
        // DBに挿入
        $inquiry -> save();
        // Slack通知
        $text = '名前: '.$inquiry['name']."\nメールアドレス: ".$inquiry['email']."\n本文: ".$inquiry['post'];
        \Slack::send($text);
        // 入力されたメールアドレスにメール送信
        // $name = $inquiry['name'];
        // $email = $inquiry['email'];
        // $post = $inquiry['post'];
          // $message -> to(['email' => $email]) -> sublect('MeeTasu');
          // $message -> from('yuta.sugawara@meetasu.jp', 'meetasu');
        // });
        \Mail::to($inquiry -> email)
        ->send(new SendGridSample($inquiry));
      // 再送信を防ぐためにトークンを再発行
      $request -> session() -> regenerateToken();
      // 送信完了ページ表示
      return view('thanks');

    } else {

      // 戻るが押された時に、入力内容を保持したまま入力画面へ戻る
      return redirect() -> action('ContactController@create')
      -> withInput($inquiry);

      }
    }
}
