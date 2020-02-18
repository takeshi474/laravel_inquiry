<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class SendGridSample extends Mailable
{
    use SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     // 引数で受け取ったデータ用の変数
     protected $contact;

    public function __construct($contact)
    {
        // 引数で受け取ったデータを変数にセット
        $this -> contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('emails.email') //呼び出すテンプレートを指定
        ->subject('お問い合わせ内容確認') //件名
        ->with(['contact' => $this -> contact]) //withオプションでセットしたデータをテンプレートに渡す
        ->sendgrid([
          // 'personalizations' => [
          //   [
          //   'subtitutions' => [
          //     ':myname' => 'Ysg',
          //     ]
          //   ],
          // ],
        ]);
    }
}
