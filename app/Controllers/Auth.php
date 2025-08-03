<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('login');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Set session data
                $sessionData = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'role'       => $user['role'],
                    'logged_in'  => true
                ];

                session()->set($sessionData);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('register', $data);
    }

    public function saveRegister()
    {
        // Validate input
        if (!$this->validate([
            'username'     => 'required|min_length[3]|is_unique[user.username]',
            'nama_lengkap' => 'required',
            'password'     => 'required|min_length[6]'
        ])) {
            return redirect()->to('/register')->withInput()->with('validation', $this->validator);
        }

        // Save user with default role as customer
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'password' => $this->request->getVar('password'),
            'role' => 'customer'
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil, silahkan login');
        return redirect()->to('/login');
    }
}