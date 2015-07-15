<?php

namespace App\Listeners;

use Larabook\Mailers\UserMailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Larabook\Registration\Events\UserHasRegistered;

class EmailNotifier
{
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param UserMailer $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
}
