<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProductsSupplied extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($supplyId,$product_name,$desc)
    {
        $this->supplyId = $supplyId;
        $this->products = $product_name;
        $this->desc = $desc;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/supplies/'.$this->supplyId);

        $product = implode(', ',$this->products);
        $desc = $this->desc;
        return (new MailMessage)
                    ->subject('New supplies.')
                    ->line('The following products were supplied to the store.')
                    ->line('<li>'.$product.'</li>')
                    ->action('View Supply', $url)
                    ->line('The following description was given!')
                    ->line($desc);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $url = url('/supplies/'.$this->supplyId);

        $product = implode(', ',$this->products);
        $desc = $this->desc;
        return [
            'subject' => 'New supplies.',
            'line' => [
                'The following products were supplied to the store.',
                'item' => $product,
                'desc' => $desc,
            ],
            'action' => 'View Supply',
            'url' => $url,
            'thanks' => 'Regards',
            'name' => 'Admin'
        ];
    }
}
