<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kecamatan_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'kabupaten_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'kecamatan_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
		]);
		$this->forge->addKey('kecamatan_id', true);
		$this->forge->addForeignKey('kabupaten_id', 'kabupaten', 'kabupaten_id');
		$this->forge->createTable('kecamatan');
	}

	public function down()
	{
		$this->forge->dropTable('kecamatan');
	}
}
