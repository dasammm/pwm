<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'nama_lengkap', 'password', 'role'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'username'     => 'required|min_length[3]|is_unique[user.username,id,{id}]',
        'nama_lengkap' => 'required',
        'password'     => 'required|min_length[6]',
        'role'         => 'required|in_list[admin,client,customer]'
    ];
    
    protected $validationMessages = [
        'username' => [
            'required'   => 'Username harus diisi',
            'min_length' => 'Username minimal 3 karakter',
            'is_unique'  => 'Username sudah digunakan'
        ],
        'nama_lengkap' => [
            'required'   => 'Nama lengkap harus diisi'
        ],
        'password' => [
            'required'   => 'Password harus diisi',
            'min_length' => 'Password minimal 6 karakter'
        ],
        'role' => [
            'required'   => 'Role harus diisi',
            'in_list'    => 'Role harus salah satu dari: admin, client, customer'
        ]
    ];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }

    public function getUsersByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }
}