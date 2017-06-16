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
    protected $idForgot;
    protected $md5Forgot;
//    protected $emailForgot;


    public function __construct($idForgot, $md5Forgot)
    {
        $this->idForgot = $idForgot;
        $this->md5Forgot = $md5Forgot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('adminlte.emails.forgotpassword')->with([
            'idForgot' => $this->idForgot,
            'md5Forgot' => $this->md5Forgot,
        ]);
    }
}
