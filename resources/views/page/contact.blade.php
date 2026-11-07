@extends('layouts.app')

@section('title', 'Contact - MyProfile')

@section('content')
<div class="container flex-grow-1 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <h3 class="fw-bold text-dark mb-2 text-center">Hubungi Saya</h3>
                <p class="text-secondary text-center small mb-4">Jika Anda memiliki pertanyaan, tawaran proyek, atau ingin berdiskusi, silakan hubungi saya melalui kontak di bawah ini.</p>

                <div class="list-group list-group-flush mb-4">
                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-circle me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </div>
                        <div>
                            <small class="text-muted d-block">Email</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->email ?? 'farras.dehya@gmail.com' }}</span>
                        </div>
                    </div>

                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="bg-success bg-opacity-10 text-success p-2 rounded-circle me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </div>
                        <div>
                            <small class="text-muted d-block">Kampus / Lokasi</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->kampus ?? 'Universitas Pamulang' }}</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
