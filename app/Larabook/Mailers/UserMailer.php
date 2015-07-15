<?php


namespace Larabook\Mailers;


use Larabook\Users\User;

class UserMailer extends Mailer
{
    public function sendWelcomeMessageTo(User $user)
    {
        $view = 'emails.registration.confirm';
        $subject = 'Welcome aboard';

        $this->sendTo($user, $subject, $view);
    }
}
