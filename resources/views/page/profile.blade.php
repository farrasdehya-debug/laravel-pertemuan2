@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mt-5 shadow-sm border-0">

                    <div class="card-header bg-warning text-white text-center py-4">

                        <div class="d-flex justify-content-center mb-3">
                            <img
                                src="{{ asset('Foto Profil.jpg') }}"
                                class="rounded-circle img-thumbnail shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;"
                                alt="Foto Profil">
                        </div>

                        <h4 class="mb-0">Data Mahasiswa</h4>

                        <span class="badge bg-success mt-2">
                            {{ $mahasiswa->status ?? 'Aktif' }}
                        </span>

                    </div>

                    <div class="card-body p-4">

                        <p>
                            <strong>Nama:</strong>
                            {{ $mahasiswa->nama ?? '-' }}
                        </p>

                        <p>
                            <strong>NIM:</strong>
                            {{ $mahasiswa->nim ?? '-' }}
                        </p>

                        <p>
                            <strong>Jurusan:</strong>
                            {{ $mahasiswa->prodi ?? '-' }}
                        </p>

                        <p>
                            <strong>Kampus:</strong>
                            {{ $mahasiswa->kampus ?? '-' }}
                        </p>

                        <p class="mb-0">
                            <strong>Email:</strong>
                            {{ $mahasiswa->email ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection