@extends('layouts.app')

@section('title', 'Portofolio Project')

@section('content')
    <div class="container flex-grow-1 py-4">
        <div class="mb-4 text-center">
            <h2 class="fw-bold">Portofolio Project</h2>
            <p class="text-muted">Daftar project praktikum yang dikerjakan mahasiswa</p>
        </div>

        <div class="row g-4">
            @forelse ($projects as $project)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 d-flex flex-column">
                        <div class="text-center pt-4">
                            <img src="{{ asset('images/' . $project->image) }}" class="rounded-circle img-thumbnail shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;" alt="{{ $project->title }}">
                        </div>

                        <div class="card-body d-flex flex-column text-center">
                            <div class="mb-2">
                                <span class="badge {{ $project->status == 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $project->status }}
                                </span>
                            </div>

                            <h5 class="card-title fw-bold text-dark">{{ $project->title }}</h5>
                            <p class="text-muted card-text small flex-grow-1">
                                {{ Str::limit($project->description, 70) }}
                            </p>

                            <div class="mt-auto pt-3 border-top">
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <strong>Tech:</strong> {{ $project->teknologi }}
                                    </small>
                                </div>
                                <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary w-100">
                                    Detail Project
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada project yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

