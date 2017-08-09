<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $idNewUser;
    protected $md5EmailNewUser;

    public function __construct($idNewUser, $md5EmailNewUser)
    {
        $this->idNewUser = $idNewUser;
        $this->md5EmailNewUser = $md5EmailNewUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('adminlte.emails.registeruser')->with([
            'idNewUser' => $this->idNewUser,
            'md5EmailNewUser' => $this->md5EmailNewUser
        ]);
    }
}
