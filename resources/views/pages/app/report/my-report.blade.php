@extends('layouts.app')

@section('title', 'Laporanmu')

@section('content')
    <ul class="nav nav-tabs" id="filter-tab" role="tablist">
        @php
            $statusTabs = [
                'delivered' => 'Terkirim',
                'in_process' => 'Diproses',
                'completed' => 'Selesai',
                'rejected' => 'Ditolak',
            ];
            $currentStatus = request('status') ?? 'delivered';
        @endphp

        @foreach ($statusTabs as $statusKey => $label)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $currentStatus === $statusKey ? 'active' : '' }}"
                    href="{{ url()->current() }}?status={{ $statusKey }}" id="{{ $statusKey }}-tab" role="tab">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach ($statusTabs as $statusKey => $label)
            <div class="tab-pane fade {{ $currentStatus === $statusKey ? 'show active' : '' }}"
                id="{{ $statusKey }}-tab-pane" role="tabpanel" aria-labelledby="{{ $statusKey }}-tab" tabindex="0">

                <div class="d-flex flex-column gap-3 mt-3">
                    @php
                        $filteredReports = $reports->filter(function ($report) use ($statusKey) {
                            $latestStatus = $report->reportStatuses->last();
                            return $latestStatus && $latestStatus->status === $statusKey;
                        });
                    @endphp

                    @forelse ($filteredReports as $report)
                        @php
                            $latestStatus = $report->reportStatuses->last();
                        @endphp

                        <div class="card card-report border-0 shadow-none">
                            <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">
                                <div class="card-body p-0">
                                    <div class="card-report-image position-relative mb-2">
                                        <img src="{{ asset('storage/' . $report->image) }}" alt="">

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

                                            @case('rejected')
                                                <div class="badge-status rejected">Ditolak</div>
                                            @break
                                        @endswitch
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

                                    <h1 class="card-title">{{ $report->title }}</h1>
                                </div>
                            </a>
                        </div>
                        @empty
                            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 75vh"
                                id="no-reports-{{ $statusKey }}">
                                <div id="lottie-{{ $statusKey }}" style="width: 300px; height: 300px;"></div>
                                <h5 class="mt-3">Belum ada laporan</h5>
                                <a href="" class="btn btn-primary py-2 px-4 mt-3">
                                    Buat Laporan
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
        <script>
            const statuses = ['delivered', 'in_process', 'completed', 'rejected'];

            statuses.forEach(status => {
                const container = document.getElementById(`lottie-${status}`);
                if (container) {
                    bodymovin.loadAnimation({
                        container: container,
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: '{{ asset('assets/app/lottie/not-found.json') }}'
                    });
                }
            });
        </script>
    @endsection
