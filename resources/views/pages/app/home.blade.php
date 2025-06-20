@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h6 class="greeting">Hi, {{ Auth::user()?->name }}👋</h6>
    <h4 class="home-headline">Laporkan masalahmu dan kami segera atasi itu</h4>

    <div class="d-flex align-items-center justify-content-between gap-4 py-3 overflow-auto" id="category"
        style="white-space: nowrap;">
        @foreach ($categories as $category)
            <a href="{{ route('report.index', ['category' => $category->name]) }}" class="category d-inline-block">
                <div class="icon">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="icon">
                </div>
                <p>{{ $category->name }}</p>
            </a>
        @endforeach
    </div>

    <div class="py-3" id="reports">
        <div class="d-flex justify-content-between align-items-center">
            <h6>Pengaduan terbaru</h6>
            <a href="{{ route('report.index') }}" class="text-primary text-decoration-none show-more">
                Lihat semua
            </a>
        </div>

        <div class="d-flex flex-column gap-3 mt-3">
            @if ($reports->isEmpty())
                <div class="text-center text-muted">
                    <p>Belum ada laporan yang kamu buat.</p>
                </div>
            @else
                @foreach ($reports as $report)
                    <div class="card card-report border-0 shadow-none">
                        <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">
                            <div class="card-body p-0">
                                <div class="card-report-image position-relative mb-2">
                                    <img src="{{ asset('storage/' . $report->image) }}" alt="">

                                    @php
                                        $latestStatus = $report->reportStatuses->last();
                                    @endphp

                                    @if ($latestStatus)
                                        @switch($latestStatus->status)
                                            @case('delivered')
                                                <div class="badge-status on-process">Terkirim</div>
                                                @break
                                            @case('in_process')
                                                <div class="badge-status on-process">Diproses</div>
                                                @break
                                            @case('completed')
                                                <div class="badge-status done">Selesai</div>
                                                @break
                                        @endswitch
                                    @endif
                                </div>

                                <div class="d-flex justify-content-between align-items-end mb-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                            class="icon me-2">
                                        <p class="text-primary city">
                                            {{ \Str::substr($report->address, 0, 20) }}...
                                        </p>
                                    </div>
                                    <p class="text-secondary date">
                                        {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y H:i') }}
                                    </p>
                                </div>

                                <h1 class="card-title">
                                    {{ $report->title }}
                                </h1>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
