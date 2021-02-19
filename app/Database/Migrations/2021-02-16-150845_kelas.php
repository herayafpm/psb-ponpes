<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kelas_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'kelas_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'kelas_mulai'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default' => 0
			],
			'kelas_selesai'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default' => 0
			],
		]);
		$this->forge->addKey('kelas_id', true);
		$this->forge->createTable('kelas');
	}

	public function down()
	{
		$this->forge->dropTable('kelas');
	}
}
