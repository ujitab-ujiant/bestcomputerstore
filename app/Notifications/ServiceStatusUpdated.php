<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ServiceStatusUpdated extends Notification
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
            'type' => 'service_status_updated',
            'service_code' => $this->serviceOrder->service_code,
            'message' => "Status servis #{$this->serviceOrder->service_code} Anda berubah menjadi {$this->serviceOrder->status}",
            'url' => url('/customer/service-detail/' . $this->serviceOrder->id),
            'created_at' => now()->toISOString(),
        ];
    }
}
