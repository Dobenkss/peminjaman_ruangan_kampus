<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    private function createUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        if ($user['role'] == 'admin') {
            session()->set('admin', $data);
        } elseif ($user['role'] == 'anggota') {
            session()->set('anggota', $data);
        }
    }

    public function login()
    {
        helper('form');
        return view('auth/login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->createUserSession($user);
                session()->set('user', $user);

                $successMessage = 'Login berhasil';
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard')->with('success', $successMessage);
                } elseif ($user['role'] == 'anggota') {
                    return redirect()->to('/anggota/dashboard')->with('success', $successMessage);
                }
            } else {
                // Password tidak cocok
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function register()
    {
        helper('form');
        return view('auth/register');
    }

    public function processRegister()
    {
        $validationRules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
        ];

        if ($this->validate($validationRules)) {
            $userModel = new UserModel();

            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role') ?? 'anggota',
            ];

            $userModel->insert($data);

            session()->setFlashdata('success', 'Registrasi berhasil');

            var_dump(session()->getFlashdata('success')); 

            return redirect()->to('/');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
