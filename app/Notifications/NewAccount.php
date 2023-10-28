<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAccount extends Notification
{
    use Queueable;
    public $user;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $userPassord)
    {
        $this->user = $user;
        $this->password = $userPassord;
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
            ->subject("Nouveau compte Blogger")
            ->greeting('Bonjour '.$this->user->name.'!!! ')
            ->line('Votre nouveau compte viens d\'être créer')
            ->line('Voici vos identifiants de connexion')
            ->line('Identifiant: '.$this->user->phone)
            ->line('Mot de passe: '.$this->password)
            ->action('Cliquez sur le lien suivant pour accéder au site', url(route('login')));
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
