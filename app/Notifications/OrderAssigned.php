<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderAssigned extends Notification
{
    use Queueable;

    public function __construct(public $serviceOrder) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'type' => 'order_assigned',
            'service_code' => $this->serviceOrder->service_code,
            'message' => "Service order baru #{$this->serviceOrder->service_code} untuk {$this->serviceOrder->customer_name} telah ditugaskan kepada Anda.",
            'url' => url('/service-orders/' . $this->serviceOrder->id),
            'created_at' => now()->toISOString(),
        ];
    }
}
