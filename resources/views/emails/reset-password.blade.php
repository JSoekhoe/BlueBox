@component('mail::message')
    # Password Reset Notification

    Hello {{ $user->firstname }},

    Your password has been reset by the admin. Your new password is:

    @component('mail::panel')
        {{ $newPassword }}
    @endcomponent

    Please log in and change your password as soon as possible.

    @component('mail::button', ['url' => route('login')])
        Login
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
