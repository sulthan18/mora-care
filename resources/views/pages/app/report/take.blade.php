@extends('layouts.no-nav')

@section('title', 'Ambil Foto')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <video autoplay="true" id="video-webcam">
            Mohon Maaf, Browser anda tidak mendukung
        </video>

        <div class="d-flex justify-content-center position-absolute bottom-0">
            <button class="btn btn-primary btn-snap mb-3" onclick="takeSnapshot()">
                <i class="fas fa-camera"></i>
            </button>
        </div>
    </div>

@endsection
