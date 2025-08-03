<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll()
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('user/create', $data);
    }

    public function save()
    {
        // Validate input
        if (!$this->validate($this->userModel->getValidationRules())) {
            return redirect()->to('/user/create')->withInput()->with('validation', $this->validator);
        }

        // Save user
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('flash', 'User berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->find($id)
        ];

        return view('user/edit', $data);
    }

    public function update($id)
    {
        // Validate input
        if (!$this->validate($this->userModel->getValidationRules())) {
            return redirect()->to('/user/edit/' . $id)->withInput()->with('validation', $this->validator);
        }

        // Update user
        $this->userModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role')
        ]);

        session()->setFlashdata('flash', 'User berhasil diupdate');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('flash', 'User berhasil dihapus');
        return redirect()->to('/user');
    }

    public function admin()
    {
        $data = [
            'users' => $this->userModel->getUsersByRole('admin')
        ];

        return view('user/admin', $data);
    }

    public function client()
    {
        $data = [
            'users' => $this->userModel->getUsersByRole('client')
        ];

        return view('user/client', $data);
    }

    public function customer()
    {
        $data = [
            'users' => $this->userModel->getUsersByRole('customer')
        ];

        return view('user/customer', $data);
    }
}