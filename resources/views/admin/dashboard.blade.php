@extends('admin.template')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-4">
        <h2 class="fw-bold mb-2 text-dark">Admin Dashboard</h2>
        <p class="text-secondary fs-6 mb-0">Welcome to the admin dashboard!</p>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted text-uppercase fw-semibold small">Total Projects</span>
                            <h2 class="fw-bold text-dark mt-2 mb-0">{{ $totalProjects }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 1.99-2.18h3.983l1.286 1.286a1 1 0 0 0 .707.293h2.386a1 1 0 0 0 .707-.293z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <a href="{{ route('admin.project.index') }}" class="text-decoration-none small fw-semibold text-primary">
                            Kelola data project &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted text-uppercase fw-semibold small">Project Selesai</span>
                            <h2 class="fw-bold text-success mt-2 mb-0">{{ $totalCompleted }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <span class="text-muted small">Status pengerjaan selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted text-uppercase fw-semibold small">In Progress</span>
                            <h2 class="fw-bold text-warning mt-2 mb-0">{{ $totalInProgress }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 4V3h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.051 8.5 8.35z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <span class="text-muted small">Sedang dalam proses pengembangan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
