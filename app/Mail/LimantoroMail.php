<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LimantoroMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dre)
    {
        $this -> dre = $dre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this -> dre['email'];
        $token = $this -> dre['token'];
        $drw = ['email' => $email, 'token' => $token];
        return $this -> from ('noreply@limantoroagungproperty.com', 'Limantoro Email System') -> view('login.emailFormatResetPassword') -> subject("Password reset") -> with($drw);
    }
}
