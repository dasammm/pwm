<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masterpelanggan extends Migration
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
			'no_pelanggan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
				'unique'	=> true,
			],
			'nama_pelanggan' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat_pelanggan' => [
				'type'       => 'TEXT',
			],
			'kota_pelanggan' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'nomor_telepon' => [
				'type'       => 'VARCHAR',
				'constraint' => '13',
			],
			'kode_wilayah' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
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
		$this->forge->createTable('master_pelanggan');
	}

	public function down()
	{
		$this->forge->dropTable('master_pelanggan');
	}
}
