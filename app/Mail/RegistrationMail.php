<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $resetUrl;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $password
     * @param string $resetUrl
     * @return void
     */
    public function __construct(User $user, $password, $resetUrl)
    {
        $this->user = $user;
        $this->password = $password;
        $this->resetUrl = $resetUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration')
            ->subject('Your Account Registration')
            ->with([
                'firstname' => $this->user->firstname,
                'email' => $this->user->email,
                'password' => $this->password,
                'resetUrl' => $this->resetUrl,
            ]);
    }
}
