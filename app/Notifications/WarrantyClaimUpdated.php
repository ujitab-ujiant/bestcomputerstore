<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class WarrantyClaimUpdated extends Notification
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
        $statusLabel = [
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ][$this->warrantyClaim->status] ?? $this->warrantyClaim->status;

        return [
            'type' => 'warranty_claim_updated',
            'service_code' => $serviceOrder->service_code ?? '-',
            'message' => "Pengajuan garansi untuk #{$serviceOrder->service_code} telah {$statusLabel}.",
            'url' => url('/customer/warranty'),
            'created_at' => now()->toISOString(),
        ];
    }
}
