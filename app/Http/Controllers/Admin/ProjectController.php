<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('teknologi', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $projects = $query->latest()->paginate(10)->withQueryString();

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ], [
            'title.required' => 'Judul project wajib diisi.',
            'description.required' => 'Deskripsi project wajib diisi.',
            'teknologi.required' => 'Teknologi wajib diisi.',
            'status.required' => 'Status project wajib dipilih.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, webp, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = 'project1.jpg';
        }

        Project::create($validated);

        return redirect()->route('admin.project.index')->with('success', 'Project baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ], [
            'title.required' => 'Judul project wajib diisi.',
            'description.required' => 'Deskripsi project wajib diisi.',
            'teknologi.required' => 'Teknologi wajib diisi.',
            'status.required' => 'Status project wajib dipilih.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, webp, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            // Delete old custom image if exists and not one of the default project seeds
            if ($project->image && !preg_match('/^project\d+\.jpg$/', $project->image)) {
                $oldPath = public_path('images/' . $project->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $validated['image'] = $filename;
        }

        $project->update($validated);

        return redirect()->route('admin.project.index')->with('success', 'Data project berhasil diperbarui!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && !preg_match('/^project\d+\.jpg$/', $project->image)) {
            $oldPath = public_path('images/' . $project->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil dihapus!');
    }
}
