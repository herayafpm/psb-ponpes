<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Soal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'soal_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'soal_soal' => [
				'type' => 'TEXT',
			],
			'soal_a'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'					=> true
			],
			'soal_b'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'					=> true
			],
			'soal_c'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'					=> true
			],
			'soal_d'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'					=> true
			],
			'soal_kunci'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'					=> true
			],
			'soal_aktif'       => [
				'type'           => 'INT',
				'constraint'     => 1,
				'default' => 0
			],
		]);
		$this->forge->addKey('soal_id', true);
		$this->forge->createTable('soal');
	}

	public function down()
	{
		$this->forge->dropTable('soal');
	}
}
