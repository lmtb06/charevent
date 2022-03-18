<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MdpOublieMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $u, $pass)
    {
        $this->user = $u;
        $this->password = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@charevent.fr', 'Charevent')->view('mails.mail_oubli');
    }
}
