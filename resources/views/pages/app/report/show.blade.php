@extends('layouts.app')

@section('title', $report->code)

@section('content')
    <div class="header-nav">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/app/images/icons/ArrowLeft.svg') }}" alt="arrow-left">
        </a>

        <h1>Detail Laporan {{ $report->code }}</h1>
    </div>

    <img src="{{ asset('storage/' . $report->image) }}" alt="" class="report-image mt-5">

    <h1 class="report-title mt-3">{{ $report->title }}</h1>

    <div class="card card-report-information mt-4">
        <div class="card-body">
            <div class="card-title mb-4 fw-bold">Detail Informasi</div>

            <div class="row mb-3">
                <div class="col-4 text-secondary">Kode</div>
                <div class="col-8 d-flex">
                    <span class="me-2">
                        :
                    </span>
                    <p>
                        {{ $report->code }}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-secondary">Tanggal</div>
                <div class="col-8 d-flex">
                    <span class="me-2">
                        :
                    </span>
                    <p>
                        {{ Carbon\Carbon::parse($report->created_at)->format('d F Y H:i') }}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-secondary">Kategori</div>
                <div class="col-8 d-flex">
                    <span class="me-2">
                        :
                    </span>
                    <p>
                        {{ $report->reportCategory->name }}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-secondary">Lokasi</div>
                <div class="col-8 d-flex">
                    <span class="me-2">
                        :
                    </span>
                    <p>
                        {{ $report->address }}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-secondary">Status</div>
                <div class="col-8 d-flex">
                    <span class="me-2">
                        :
                    </span>
                    @php
                        $latestStatus = $report->reportStatuses->last();
                    @endphp

                    @if ($latestStatus)
                        @switch($latestStatus->status)
                            @case('delivered')
                                <div class="badge-pending">
                                    <img src="{{ asset('assets/app/images/icons/CircleNotch.svg') }}" alt="pending">
                                    <p>Terkirim</p>
                                </div>
                            @break

                            @case('in_process')
                                <div class="badge-pending">
                                    <img src="{{ asset('assets/app/images/icons/CircleNotch.svg') }}" alt="pending">
                                    <p>Diproses</p>
                                </div>
                            @break

                            @case('completed')
                                <div class="badge-success">
                                    <img src="{{ asset('assets/app/images/icons/Checks.svg') }}" alt="done">
                                    <p>Selesai</p>
                                </div>
                            @break

                            @case('rejected')
                                <div class="badge-pending">
                                    <p>Ditolak</p>
                                </div>
                            @break
                        @endswitch
                    @else
                        <div class="text-muted">Belum ada status</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="card card-report-information mt-4">
        <div class="card-body">
            <div class="card-title mb-4 fw-bold">Riwayat Perkembangan</div>

            <ul class="timeline">
                @foreach ($report->reportStatuses as $status)
                    <li class="timeline-item">
                        <div class="timeline-item-icon">
                            @if ($status->image)
                                <img src="{{ asset('storage/' . $status->image) }}" alt="status" class="img-fluid">
                            @endif
                            <span class="timeline-date">
                                {{ Carbon\Carbon::parse($status->created_at)->format('d M Y H:i') }}
                            </span>
                            <span class="timeline-event">
                                {{ $status->description }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
