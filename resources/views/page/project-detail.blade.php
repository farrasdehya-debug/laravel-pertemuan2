@extends('layouts.app')

@section('title', 'Project Detail - ' . $project->title)

@section('content')
    <div class="container py-5">
        <div class="mb-4">
            <a href="{{ route('project.index') }}" class="btn btn-outline-primary">
                &larr; Kembali ke Daftar Project
            </a>
        </div>

        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-4">
                    <img src="{{ asset('images/' . $project->image) }}" class="img-fluid rounded shadow-sm"
                        style="max-height: 380px; width: 100%; object-fit: cover;" alt="{{ $project->title }}">
                </div>

                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5">
                        <div class="mb-3">
                            <span class="badge {{ $project->status == 'Selesai' ? 'bg-success' : 'bg-warning' }} fs-6">
                                {{ $project->status }}
                            </span>
                        </div>

                        <h2 class="card-title fw-bold text-dark mb-3">{{ $project->title }}</h2>

                        <p class="text-secondary mb-4" style="line-height: 1.7;">
                            {{ $project->description }}
                        </p>

                        <div class="mb-4">
                            <h6 class="text-uppercase text-muted fw-bold small mb-2">Teknologi yang Digunakan</h6>
                            <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                                {{ $project->teknologi }}
                            </span>
                        </div>

                        <hr>

                        <div class="text-muted small">
                            <span>Dibuat pada: {{ $project->created_at ? $project->created_at->format('d M Y') : '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

