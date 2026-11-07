@extends('layouts.app')

@section('title', 'Home - MyProfile')

@section('content')
<div class="container flex-grow-1 py-5">
    <div class="row justify-content-center text-center">
        <div class="col-lg-8">
            <h1 class="display-5 fw-normal text-dark mb-4">
                Halo, Saya {{ $mahasiswa->nama ?? 'Farras Dehya' }}
            </h1>

            <div class="d-flex justify-content-center mb-4">
                <img src="{{ file_exists(public_path('Foto Profil.jpg')) ? asset('Foto Profil.jpg') : asset('images/human.png') }}"
                     alt="Foto Profil"
                     class="rounded-circle shadow-sm"
                     style="width: 170px; height: 170px; object-fit: cover;">
            </div>

            <p class="lead text-secondary mb-4">
                Saya seorang Web Developer yang passionate dalam membuat aplikasi web modern.
            </p>

            <div class="border-top pt-4 mb-4">
                <p class="text-secondary" style="max-width: 620px; margin: 0 auto; line-height: 1.7;">
                    Selamat datang di portfolio website saya. Saya memiliki pengalaman dalam Laravel, Bootstrap, dan berbagai teknologi web lainnya.
                </p>
            </div>

            <div>
                <a href="{{ route('project.index') }}" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                    Lihat Projects
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
