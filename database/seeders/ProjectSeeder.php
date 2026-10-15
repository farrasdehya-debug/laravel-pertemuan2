<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $projects = [
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi berbasis web untuk pengelolaan data mahasiswa, jadwal kuliah dan nilai perkuliahan',
                'teknologi' => 'Laravel & Bootstrap',
                'image' => 'project1.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'E-Commerce SEO Optimization',
                'description' => 'Aplikasi optimalisasi struktur heading dan indexing halaman web toko online',
                'teknologi' => 'PHP & Google Search Console',
                'image' => 'project2.jpg',
                'status' => 'In Progress',
            ],
            [
                'title' => 'Redesign Cover dan Branding',
                'description' => 'Perancangan element grafis personal Branding dan design sampul buku rekayasa web',
                'teknologi' => 'Figma & Canva',
                'image' => 'project3.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Portal Berita Mahasiswa',
                'description' => 'Berita terkini terkait kemahasiswaan',
                'teknologi' => 'Google',
                'image' => 'project4.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Status Kemahasiswaan',
                'description' => 'Menampilkan status aktif atau tidak mahasiswa',
                'teknologi' => 'Google',
                'image' => 'project5.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem Inventaris Kampus',
                'description' => 'Pengelolaan barang inventaris kampus',
                'teknologi' => 'Laravel & Livewire',
                'image' => 'project6.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem Keamanan Web Kampus',
                'description' => 'Pengelolaan web kampus',
                'teknologi' => 'Java & Laravel',
                'image' => 'project7.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Modul pembelajaran mahasiswa',
                'description' => 'Kumpulan modul pembelajaran',
                'teknologi' => 'Google',
                'image' => 'project8.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem pelanggaran mahasiswa',
                'description' => 'data pelanggaran',
                'teknologi' => 'google',
                'image' => 'project9.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem data dosen',
                'description' => 'Perancangan element grafis personal Branding dan design sampul buku rekayasa web',
                'teknologi' => 'Figma & Canva',
                'image' => 'project10.jpg',
                'status' => 'Selesai',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
