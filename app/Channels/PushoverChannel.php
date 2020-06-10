<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use App\Repositories\Contracts\PushoverRepository;

class PushoverChannel
{
    protected $pushover;

    public function __construct(PushoverRepository $pushover)
    {
        $this->pushover = $pushover;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toPushover($notifiable);

        $recipient = $notifiable->routeNotificationFor('pushover', $notification);

        $this->pushover->sendMessage($message, $recipient);
    }
}
