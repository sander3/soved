<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\PushoverChannel;
use Illuminate\Notifications\Notification;

class LotStatusChanged extends Notification
{
    use Queueable;

    public $id;

    public $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $id, string $status)
    {
        $this->id = $id;

        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [PushoverChannel::class];
    }

    /**
     * Get the Pushover representation of the notification.
     *
     * @param mixed $notifiable
     */
    public function toPushover($notifiable): string
    {
        return "{$this->id} changed to {$this->status}";
    }
}
