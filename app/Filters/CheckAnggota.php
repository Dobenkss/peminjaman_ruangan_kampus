<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckAnggota implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Implementasikan logika verifikasi pengguna sebagai anggota
        // Misalnya, periksa apakah pengguna memiliki sesi dengan peran 'anggota'
        if (!session()->get('anggota')) {
            return redirect()->to('/login'); // Redirect ke halaman login jika tidak memenuhi syarat
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosongkan metode ini, atau tambahkan logika setelah pemrosesan rute selesai jika diperlukan
    }
}
