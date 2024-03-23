<?php

namespace App\Notifications;

use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
        // Filter expired products
        $expiredProducts = Products::where('expiration_date', '<', Carbon::now())->get();

        // If there are no expired products, return an empty MailMessage
        // if ($expiredProducts->isEmpty()) {
        //     return (new MailMessage)->line('No expired products to notify about.');
        // }

        $mailMessage = (new MailMessage)
            ->line('The following products have expired:');

        // Use the line method for each expired product
        foreach ($expiredProducts as $product) {
            $mailMessage->line("Product Name: {$product->product_name}, Expiration Date: {$product->expiration_date}");
        }

        $mailMessage->action('Notification Action', url('/'))
            ->line('Thank you for understanding!');

        return $mailMessage;
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
