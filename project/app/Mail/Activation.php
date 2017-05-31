<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Activation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $adress = 'activation@mail.com';
        $name = 'TestBot';
        $subject = 'Activation Mail';


        return $this->view('email.activation')
            ->from($adress,$name)
            ->cc($adress,$name)
            ->subject($subject);
    }
}
