<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRolesToUser extends Migration
{
    public function up()
    {
        // Add role column to user table
        $this->forge->addColumn('user', [
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'client', 'customer'],
                'default'    => 'customer',
                'after'      => 'password'
            ]
        ]);
    }

    public function down()
    {
        // Remove role column from user table
        $this->forge->dropColumn('user', 'role');
    }
}