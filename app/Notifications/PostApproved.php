<?php

namespace App\Notifications;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostApproved extends Notification implements ShouldQueue
{

    use Queueable;
    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
        $route="";
        if ($this->post->author->role_id==3) {
            $route='admin.posts.show';
        }
        elseif($this->post->author->role_id==2){
            $route='blogger.posts.show';
        }
        return (new MailMessage)
            ->greeting('Bonjour !!! ' . \strtoupper($this->post->author->name))
            ->subject('Permission accordée à l\'une de vos article')
            ->line('Article :' . $this->post->title . " à l'autorisation d'être publier")
            ->line($this->post->sub_title)
            ->action('Cliquez sur le lien pour plus de details', url(route('show.post',"search&index=".$this->post->id."&query=".$this->post->slug)));

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