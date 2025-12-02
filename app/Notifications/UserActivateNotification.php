<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserActivateNotification extends Notification
{
    protected $user_data;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user_data = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Congratulation!')
            ->line("Dear Customer,")
            ->line('Your account is activated Succesfully. Please, Login with bellow Link-')
            ->action('Login', route('SignIn'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
