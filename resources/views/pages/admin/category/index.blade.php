@extends('layouts.admin')

@section('title', 'Data Kategori Laporan')
@section('content')
    <a href="{{ route('admin.report-category.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.report-category.edit', $category->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.report-category.show', $category->id) }}"
                                        class="btn btn-info">Show</a>
                                    <form action="{{ route('admin.report-category.destroy', $category->id) }}"
                                        method="POST" class="d-inline">
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
