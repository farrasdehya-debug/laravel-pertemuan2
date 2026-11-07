@extends('admin.template')

@section('title', 'Data Project')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1 text-dark">Data Project</h2>
            <p class="text-secondary small mb-0">Kelola seluruh daftar portofolio project mahasiswa</p>
        </div>
        <a href="{{ route('admin.project.create') }}" class="btn btn-warning fw-bold px-3 py-2 shadow-sm">
            + Tambah Project
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <!-- Search Filter -->
            <form method="GET" action="{{ route('admin.project.index') }}" class="row g-2 mb-4 justify-content-between">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul, teknologi, atau status..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        @if(request('search'))
                            <a href="{{ route('admin.project.index') }}" class="btn btn-outline-danger">Reset</a>
                        @endif
                    </div>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50px;">#</th>
                            <th scope="col" style="width: 90px;">Gambar</th>
                            <th scope="col" style="min-width: 180px;">Judul Project</th>
                            <th scope="col" style="min-width: 250px;">Deskripsi</th>
                            <th scope="col">Teknologi</th>
                            <th scope="col" style="width: 120px;">Status</th>
                            <th scope="col" style="width: 150px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $index => $project)
                            <tr>
                                <td class="text-muted fw-semibold">
                                    {{ $projects->firstItem() + $index }}
                                </td>
                                <td>
                                    <img src="{{ asset('images/' . $project->image) }}" 
                                         alt="{{ $project->title }}" 
                                         class="rounded img-thumbnail"
                                         style="width: 65px; height: 65px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $project->title }}</div>
                                    <small class="text-muted">ID: #{{ $project->id }}</small>
                                </td>
                                <td>
                                    <span class="text-muted small">
                                        {{ Str::limit($project->description, 80) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $project->teknologi }}
                                    </span>
                                </td>
                                <td>
                                    @if ($project->status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $project->status }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    Belum ada data project. Silakan klik tombol <strong>+ Tambah Project</strong>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    Menampilkan {{ $projects->firstItem() ?? 0 }} sampai {{ $projects->lastItem() ?? 0 }} dari {{ $projects->total() }} project
                </small>
                <div>
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
