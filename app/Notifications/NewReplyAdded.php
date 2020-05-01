<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyAdded extends Notification
{
    use Queueable;
    public $discussion;
    public $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($d, $r)
    {
        $this->discussion = $d;
        $this->reply = $r;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello '.$this->discussion->user->name.',')
                    ->line($this->reply->user->name.' recently replied on a discussion that you are following.')
                    ->action('View Discussion', route('discussion', ['slug' => $this->discussion->slug ]))
                    ->line('Thank you for watching this discussion.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
