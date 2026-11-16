<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class WarrantyClaimSubmitted extends Notification
{
    use Queueable;

    public function __construct(public $warrantyClaim) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        $serviceOrder = $this->warrantyClaim->serviceOrder;
        return [
            'type' => 'warranty_claim_submitted',
            'service_code' => $serviceOrder->service_code ?? '-',
            'message' => "Klaim garansi baru untuk service order #{$serviceOrder->service_code} telah diajukan.",
            'url' => url('/admin/warranty/' . $this->warrantyClaim->id),
            'created_at' => now()->toISOString(),
        ];
    }
}
