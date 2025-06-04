@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Notifikasi</h4>

    @forelse($notifications as $notification)
        <div class="p-3 mb-3 bg-white border rounded shadow-sm d-flex justify-content-between align-items-start">
            <div>
                <div class="fw-semibold text-dark">
                    {{ $notification->data['message'] ?? 'Notifikasi baru' }}
                </div>
                <div class="text-muted small mt-1" title="{{ $notification->created_at->format('d M Y, H:i') }}">
                    {{ $notification->created_at->diffForHumans() }}
                </div>
            </div>
            {{-- @if(isset($notification->data['url']))
                <a href="{{ $notification->data['url'] }}" class="btn btn-sm btn-light border ms-3">
                    Detail
                </a>
            @endif --}}
        </div>
    @empty
        <div class="text-center text-muted">
            <i class="bi bi-bell-slash fs-1"></i>
            <p class="mt-2">Tidak ada notifikasi saat ini.</p>
        </div>
    @endforelse
</div>
@endsection
