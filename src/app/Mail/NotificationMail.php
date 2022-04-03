<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $destinataire;
    public $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $destinataire, $message)
    {
        $this->destinataire = $destinataire;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("test@charevent.fr")->view('mails.notification');
    }
}
