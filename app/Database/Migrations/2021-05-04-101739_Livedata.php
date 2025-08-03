<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livedata extends Migration
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
				'constraint' => '255',
			],
			'kode_masalah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'data_air'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'data_pulsa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
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
		$this->forge->createTable('data_live');
	}

	public function down()
	{
		$this->forge->dropTable('data_live');
	}
}
