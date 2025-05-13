@extends('layouts.admin')

@section('title', 'Detail Laporan')

@section('content')
    <a href="{{ route('admin.report.index') }}" class="btn btn-danger mb-3">Kembali</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Laporan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Kode Laporan</td>
                    <td>{{ $report->code }}</td>
                </tr>
                <tr>
                    <td>Pelapor</td>
                    <td>{{ $report->resident->user->email }} - {{ $report->resident->user->name }}</td>
                </tr>
                <tr>
                    <td>Kategori Laporan</td>
                    <td>{{ $report->reportCategory->name }}</td>
                </tr>
                <tr>
                    <td>Judul Laporan</td>
                    <td>{{ $report->title }}</td>
                </tr>
                <tr>
                    <td>Deskripsi Laporan</td>
                    <td>{{ $report->description }}</td>
                </tr>
                <tr>
                    <td>Bukti Laporan</td>
                    <td>
                        <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="200">
                    </td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td>{{ $report->latitude }}</td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td>{{ $report->longitude }}</td>
                </tr>
                <tr>
                    <td>Map View</td>
                    <td>
                        <div id="map" style="height: 300px"></div>
                    </td>
                </tr>
                <tr>
                    <td>Alamat Laporan</td>
                    <td>{{ $report->address }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Progress Laporan</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.report-status.create') }}" class="btn btn-primary mb-3">Tambah Progress</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->reportStatuses as $status)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $status->image) }}" alt="image" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.report-status.edit', $status->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.report.show', $status->id) }}" class="btn btn-info">Show</a>
                                    <form action="{{ route('admin.report-status.destroy', $status->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize the map with more configuration options
        const mapOptions = {
            center: [{{ $report->latitude }}, {{ $report->longitude }}],
            zoom: 15,
            zoomControl: true,
            attributionControl: true
        };
        const map = L.map('map', mapOptions);

        // Add multiple tile layers for better map viewing
        const tileLayerOptions = {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19,
            minZoom: 3
        };

        // Standard OpenStreetMap layer
        const osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', tileLayerOptions);

        // Satellite layer from OpenStreetMap
        const satelliteLayer = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
                maxZoom: 19,
                minZoom: 3
            });

        // Add default layer
        osmLayer.addTo(map);

        // Create a custom marker with a more distinctive icon
        const markerIcon = L.icon({
            iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Determine location description based on available information
        const locationDescription = (() => {
            @php
                $description = '';
                if (!empty($report->address)) {
                    $description = $report->address;
                } else {
                    $description = 'Lokasi tidak terperinci';
                }
            @endphp
            return '{{ $description }}';
        })();

        // Add marker with custom icon
        const marker = L.marker(
            [{{ $report->latitude }}, {{ $report->longitude }}], {
                icon: markerIcon
            }
        ).addTo(map);

        // Detailed popup with location information
        marker.bindPopup(`
            <div class="map-popup">
                <h4>Lokasi Laporan</h4>
                <p><strong>Detail Lokasi:</strong> ${locationDescription}</p>
                <p class="text-muted small">Lokasi dilaporkan dengan akurasi spesifik</p>
            </div>
        `).openPopup();

        // Add layer control
        const baseLayers = {
            "OpenStreetMap": osmLayer,
            "Satellite": satelliteLayer
        };
        L.control.layers(baseLayers).addTo(map);

        // Add fullscreen control
        map.addControl(new L.Control.Fullscreen());

        // Responsive map resize
        function resizeMap() {
            if (map) {
                map.invalidateSize();
            }
        }
        window.addEventListener('resize', resizeMap);
    </script>
@endsection
