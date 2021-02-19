<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kabupaten extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kabupaten_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'provinsi_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'kabupaten_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
		]);
		$this->forge->addKey('kabupaten_id', true);
		$this->forge->addForeignKey('provinsi_id', 'provinsi', 'provinsi_id');
		$this->forge->createTable('kabupaten');
	}

	public function down()
	{
		$this->forge->dropTable('kabupaten');
	}
}
