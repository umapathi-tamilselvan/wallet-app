<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreditMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$amount)
    {
        $this->user = $user;
        $this->amount = $amount;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->markdown('mail.credit-mail');
}
}
