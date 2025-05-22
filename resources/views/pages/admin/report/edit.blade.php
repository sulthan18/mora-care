@extends('layouts.admin')

@section('title', 'Edit Data Kategori')

@section('content')
    <a href="{{ route('admin.report.index') }}" class="btn btn-danger mb-3">Kembali</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.report.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Kode --}}
                <div class="form-group">
                    <label for="code">Kode</label>
                    <input type="text" id="code" name="code"
                        class="form-control @error('code') is-invalid @enderror" value="{{ $report->code }}" disabled>
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pelapor --}}
                <div class="form-group">
                    <label for="resident_id">Pelapor / Masyarakat</label>
                    <select name="resident_id" id="resident_id"
                        class="form-control @error('resident_id') is-invalid @enderror">
                        @foreach ($residents as $resident)
                            <option value="{{ $resident->id }}" @if (old('resident_id', $report->resident_id) == $resident->id) selected @endif>
                                {{ $resident->user?->email ?? 'User hilang' }} - {{ $resident->user?->name ?? '-' }}
                            </option>
                        @endforeach
                    </select>
                    @error('resident_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="form-group">
                    <label for="report_category_id">Kategori Laporan</label>
                    <select name="report_category_id" id="report_category_id"
                        class="form-control @error('report_category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('report_category_id', $report->report_category_id) == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('report_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Judul --}}
                <div class="form-group">
                    <label for="title">Judul Laporan</label>
                    <input type="text" id="title" name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $report->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="description">Deskripsi Laporan</label>
                    <textarea id="description" name="description" rows="5"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $report->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="form-group">
                    <label for="image">Bukti Laporan</label><br>
                    <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="100" class="mb-2">
                    <input type="file" id="image" name="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Latitude --}}
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" id="latitude" name="latitude"
                        class="form-control @error('latitude') is-invalid @enderror"
                        value="{{ old('latitude', $report->latitude) }}">
                    @error('latitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Longitude --}}
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" id="longitude" name="longitude"
                        class="form-control @error('longitude') is-invalid @enderror"
                        value="{{ old('longitude', $report->longitude) }}">
                    @error('longitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="form-group">
                    <label for="address">Alamat Laporan</label>
                    <textarea id="address" name="address" rows="5" class="form-control @error('address') is-invalid @enderror">{{ old('address', $report->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
