<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class UserRegistered extends Notification
{
    protected $user;
    protected $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Generate a password reset token
        $token = Password::createToken($notifiable);

        // Get the password reset URL
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return $this->buildMailMessage($url);
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Welcome to Our Application'))
            ->greeting('Hello ' . $this->user->firstname . ',')
            ->line(Lang::get('Your account has been created by the admin. Here are your login details:'))
            ->line('**Email:** ' . $this->user->email)
            ->action(Lang::get('Create Your Password'), $url)
            ->line(Lang::get('Please create your password by clicking the button above.'))
            ->line(Lang::get('If you did not request this, no further action is required.'));
    }
}
