<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //

    public function index()
    {
         $mahasiswa = [
        'nim' => '12345678910',
        'nama' => 'Farras Dehya',
        'prodi' => 'Sistem Informasi',
        'kampus' => 'Universitas Pamulang',
        'email' => 'farras.dehya@gmail.com',
        'status' => 'aktif',
    ];
        return view('page.profile', compact('mahasiswa'));
            }

}

   