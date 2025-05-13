@extends('layouts.admin')

@section('title', 'Edit Data Progress Laporan')

@section('content')
    <!-- Tombol Kembali -->
    <a href="{{ route('admin.report.show', $status->report->id) }}" class="btn btn-danger mb-3">Kembali</a>

    <!-- Card Edit Progress -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit Data Progress Laporan {{ $status->report->code }}
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.report-status.update', $status->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- ID Report Hidden -->
                <input type="hidden" name="report_id" value="{{ $status->report_id }}">

                <!-- Bukti (Image) -->
                <div class="form-group">
                    <label for="image">Bukti</label>
                    @if ($status->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $status->image) }}" alt="image" width="200">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="delivered" {{ old('status', $status->status) == 'delivered' ? 'selected' : '' }}>
                            Delivered</option>
                        <option value="in_process" {{ old('status', $status->status) == 'in_process' ? 'selected' : '' }}>In
                            Process</option>
                        <option value="completed" {{ old('status', $status->status) == 'completed' ? 'selected' : '' }}>
                            Completed</option>
                        <option value="rejected" {{ old('status', $status->status) == 'rejected' ? 'selected' : '' }}>
                            Rejected</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="5">{{ old('description', $status->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
