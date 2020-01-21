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

     protected $contact;

    public function __construct($contact)
    {
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
        ->view('emails.email')
        ->subject(' MeeTasu')
        // ->from('yuta.sugawara@meetasu.jp')
        // ->to(['bbsn03@ezweb.ne.jp'])
        ->with(['contact' => $this -> contact])
        ->sendgrid([
          'personalizations' => [
            [
            'subtitutions' => [
              ':myname' => 'MeeTasu',
              ]
            ],
          ],
        ]);
    }
}
