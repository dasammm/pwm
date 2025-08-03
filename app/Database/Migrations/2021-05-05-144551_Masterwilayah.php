<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masterwilayah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'kode_wilayah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'unique'	=> true,
			],
			'nama_wilayah' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'kota' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'created_at' => [
				'type'	=> 'DATETIME',
				'null'	=> true
			],
			'updated_at' => [
				'type'	=> 'DATETIME',
				'null'	=> true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('master_wilayah');
	}

	public function down()
	{
		$this->forge->dropTable('master_wilayah');
	}
}
