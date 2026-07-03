<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class BookingStatusNotification extends Notification
{
    use Queueable;

    protected $booking;

    protected $message;

    public function __construct(Booking $booking, $message)
    {
        $this->booking = $booking;

        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [

            'booking_id' => $this->booking->id,

            'booking_number' => $this->booking->booking_number,

            'message' => $this->message,

            'status' => $this->booking->status

        ];
    }
}