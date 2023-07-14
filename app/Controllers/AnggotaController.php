<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;


class AnggotaController extends Controller
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('anggota/dashboard');
    }

    public function anggota()
    {
        $userModel = new UserModel();

        // Ambil data pengguna dengan peran "anggota"
        $anggota = $userModel->where('role', 'anggota')->findAll();

        return view('anggota/list', ['anggota' => $anggota]);
    }
}
