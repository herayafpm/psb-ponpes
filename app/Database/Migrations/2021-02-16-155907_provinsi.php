<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provinsi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'provinsi_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'provinsi_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
		]);
		$this->forge->addKey('provinsi_id', true);
		$this->forge->createTable('provinsi');
	}

	public function down()
	{
		$this->forge->dropTable('provinsi');
	}
}
