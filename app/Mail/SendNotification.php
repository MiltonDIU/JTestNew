<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;
class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ip = Request::ip();
        return $this->from('web3@daffodilvarsity.edu.bd', 'Sender Name')
            ->subject('Click Notification!')
            ->view('emails.SendNotification')
            ->with([ 'ip' => $ip ]);
    }
}
