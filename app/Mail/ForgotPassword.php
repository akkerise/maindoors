<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $md5Forgot;
    protected $emailForgot;

    public function __construct($md5Forgot,$emailForgot)
    {
        $this->md5Forgot = $md5Forgot;
        $this->emailForgot = $emailForgot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('adminlte.emails.forgotpassword')->with([
            'md5Forgot' => $this->md5Forgot,
            'emailForgot' => $this->emailForgot,
        ]);
    }
}
