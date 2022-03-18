<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationInscription extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $u)
    {
        $this->user = $u;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@charevent.fr', 'Charevent')->view('mails.mail_inscription');
    }
}
