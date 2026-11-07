<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalProjects = Project::count();
        $totalCompleted = Project::where('status', 'Selesai')->count();
        $totalInProgress = Project::where('status', '!=', 'Selesai')->count();
        $mahasiswa = Mahasiswa::first();

        return view('admin.dashboard', compact('totalProjects', 'totalCompleted', 'totalInProgress', 'mahasiswa'));
    }
}
