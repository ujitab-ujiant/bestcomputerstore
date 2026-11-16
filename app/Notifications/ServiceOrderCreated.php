<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ServiceOrderCreated extends Notification
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
            'type' => 'service_order_created',
            'service_code' => $this->serviceOrder->service_code,
            'message' => "Service order baru #{$this->serviceOrder->service_code} untuk {$this->serviceOrder->customer_name} telah dibuat.",
            'url' => url('/service-orders/' . $this->serviceOrder->id),
            'created_at' => now()->toISOString(),
        ];
    }
}
