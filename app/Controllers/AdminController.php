<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;


class AdminController extends Controller
{
    public function index()
    {
        // Tampilkan halaman dashboard admin
        return view('admin/dashboard');
    }

    public function admin()
    {
        $userModel = new UserModel();

        // Ambil data pengguna dengan peran "admin"
        $admin = $userModel->where('role', 'admin')->findAll();

        return view('admin/admin/index', ['admin' => $admin]);
    }

    public function create()
    {
        return view('admin/admin/add_admin');
    }

    public function store()
    {
        $adminModel = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'admin' // Menetapkan peran (role) sebagai admin secara otomatis
        ];
        $adminModel->addUser($data);

        if ($adminModel->db->affectedRows() > 0) {
            // Jika berhasil, set pesan sukses menggunakan flash session
            return redirect()->to('/admin')->with('success', 'Data berhasil Disimpan');
        }
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['admin'] = $userModel->find($id);

        return view('admin/admin/edit_admin', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $adminModel = new UserModel();
        $adminData = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $adminModel->update(['admin_id' => $id], $adminData);

        return redirect()->to('/admin')->with('success', 'Admin berhasil diupdate');
    }

    public function delete($id)
    {
        $adminModel = new UserModel();
        $adminModel->delete($id);

        return redirect()->to('/admin')->with('delete', 'Admin berhasil dihapus');
    }
}
