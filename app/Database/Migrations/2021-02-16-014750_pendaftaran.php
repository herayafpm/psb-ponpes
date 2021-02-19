<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pendaftaran_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'pendaftaran_periode'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pendaftaran_tgl_mulai'       => [
				'type'           => 'TIMESTAMP',
			],
			'pendaftaran_tgl_selesai'       => [
				'type'           => 'TIMESTAMP',
			],
			'pendaftaran_kuota'       => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'pendaftaran_status'       => [
				'type'           => 'INT',
				'constraint'     => 1,
				'default' => 0
			],
		]);
		$this->forge->addKey('pendaftaran_id', true);
		$this->forge->createTable('pendaftaran');
	}

	public function down()
	{
		$this->forge->dropTable('pendaftaran');
	}
}
