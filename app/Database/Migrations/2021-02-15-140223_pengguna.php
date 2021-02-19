<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pengguna_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'pengguna_nik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'unique' 		 => true,
			],
			'pengguna_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pengguna_email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pengguna_password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'role_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'pengguna_created'       => [
				'type'           => 'TIMESTAMP',
				'default' => date('Y-m-d H:i:s')
			],
			'pengguna_updated'       => [
				'type'           => 'TIMESTAMP',
				'default' => date('Y-m-d H:i:s')
			],
		]);
		$this->forge->addKey('pengguna_id', true);
		$this->forge->addForeignKey('role_id', 'role', 'role_id');
		$this->forge->createTable('pengguna');
	}

	public function down()
	{
		$this->forge->dropTable('pengguna');
	}
}
