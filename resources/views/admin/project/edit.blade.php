@extends('admin.template')

@section('title', 'Edit Project - ' . $project->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.project.index') }}" class="text-decoration-none text-secondary small fw-semibold">
            &larr; Kembali ke Data Project
        </a>
        <h2 class="fw-bold mt-2 text-dark">Edit Project: {{ $project->title }}</h2>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Judul Project <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Deskripsi Project <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="teknologi" class="form-label fw-semibold">Teknologi yang Digunakan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('teknologi') is-invalid @enderror" id="teknologi" name="teknologi" value="{{ old('teknologi', $project->teknologi) }}" required>
                                @error('teknologi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">Status Project <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="Selesai" {{ old('status', $project->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="In Progress" {{ old('status', $project->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Ganti Gambar Project</label>

                            <!-- Current Image Display -->
                            <div class="mb-2">
                                <span class="d-block small text-muted mb-1">Gambar Saat Ini:</span>
                                <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail rounded" style="max-height: 150px;">
                            </div>

                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                            <small class="text-muted">Pilih file baru jika ingin mengubah gambar. Kosongkan bila ingin mempertahankan gambar yang ada saat ini.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-3 d-none" id="image-preview-container">
                                <span class="d-block small text-muted mb-1">Pratinjau Gambar Baru:</span>
                                <img id="image-preview" src="#" alt="Pratinjau Gambar Baru" class="img-thumbnail rounded" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Perbarui Project
                            </button>
                            <a href="{{ route('admin.project.index') }}" class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            const container = document.getElementById('image-preview-container');
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                container.classList.add('d-none');
            }
        }
    </script>
    @endpush
@endsection
