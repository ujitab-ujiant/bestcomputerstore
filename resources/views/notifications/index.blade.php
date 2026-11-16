@extends(auth()->user()->role === 'pelanggan' ? 'layouts.customer' : 'layouts.app')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1">Semua Notifikasi</h4>
        <p class="text-muted small mb-0">Pemberitahuan aktivitas servis, status, dan garansi perangkat Anda.</p>
    </div>
    @if(auth()->user()->unreadNotifications->count() > 0)
    <button type="button" class="btn btn-sm btn-outline-success" onclick="markAllRead()">
        <i class="fas fa-check-double me-1"></i> Tandai Semua Dibaca
    </button>
    @endif
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        @if($notifications->count() > 0)
        <div class="list-group list-group-flush">
            @foreach($notifications as $notif)
            <div class="list-group-item p-3 d-flex justify-content-between align-items-start {{ $notif->read_at ? 'bg-white' : 'bg-success-subtle' }}">
                <div class="d-flex gap-3 align-items-start">
                    <div class="rounded-circle p-2 mt-1 {{ $notif->read_at ? 'bg-light text-muted' : 'bg-success text-white' }}" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div>
                        <div class="fw-semibold text-dark {{ $notif->read_at ? '' : 'fw-bold' }}">
                            {{ $notif->data['message'] ?? 'Notifikasi Servis' }}
                        </div>
                        <small class="text-muted">{{ $notif->created_at->diffForHumans() }} ({{ $notif->created_at->format('d M Y, H:i') }})</small>
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    @if(isset($notif->data['url']))
                    <a href="{{ $notif->data['url'] }}" class="btn btn-sm btn-outline-success">
                        Buka
                    </a>
                    @endif
                    @if(!$notif->read_at)
                    <button type="button" class="btn btn-sm btn-light text-muted" onclick="markOneRead('{{ $notif->id }}')" title="Tandai telah dibaca">
                        <i class="fas fa-check"></i>
                    </button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="p-3 border-top d-flex justify-content-end">
            {{ $notifications->links('custom.pagination') }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-bell-slash text-muted mb-3" style="font-size:3rem; opacity:0.3;"></i>
            <h5 class="fw-bold text-dark">Tidak Ada Notifikasi</h5>
            <p class="text-muted small">Semua pemberitahuan akan tampil di halaman ini.</p>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
function markAllRead() {
    fetch('{{ route("notifications.read-all") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    }).then(() => {
        window.location.reload();
    });
}

function markOneRead(id) {
    fetch('{{ url("/notifications") }}/' + id + '/read', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    }).then(() => {
        window.location.reload();
    });
}
</script>
@endpush
