<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;
    private $email;
    private $title;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
      $this -> name = $inquiry['name'];
      $this -> email = $inquiry['email'];
      $this -> post = $inquiry['post'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this
      -> $address('yuta.sugawara@meetasu.jp')
      -> $subject('自動送信メール')
      -> $name('meetasu')

      $headerData = [
        'category' => 'category',
        'unique_args' => [
          'variable_1' => 'abc'
        ]
      ];

      $header = $this -> asString($headerData);

      $this -> withSwiftMessage(function ($message) use ($header) {
        $message -> getHeaders()
                 ->addTextHeader('X-SMTPAPI', $header);
      });

      return $this -> view('email.test')
                   ->from($address, $name)
                   ->cc($address, $name)
                   ->bcc($address, $name)
                   ->replyTo($address, $name)
                   ->subject($subject)
                   ->with([ 'inquiry' => $this -> inquiry ]);
      // -> view('email')
      // -> with([
      //   'name' => $this -> name,
      //   'email' => $this -> email,
      //   'post' => $this -> post,
    }

    public function asJSON($data);
    {
      $json = $this -> asJSON($data);

      return wordwrap($json, 76, "\n ");
    }
}
