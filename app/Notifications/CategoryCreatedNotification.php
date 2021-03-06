<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $categoryData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($categoryData)
    {
        $this->categoryData = $categoryData;
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
        //  return (new MailMessage)
        //              ->line('The introduction to the notification. Category Name: '.$this->categoryData['name'])
        //              ->action('Notification Action', url('/'))
        //              ->line('Thank you for using our application!');

       $name = $this->categoryData['name'];

       return (new MailMessage)->view('emails.category_created', compact('name'));
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
