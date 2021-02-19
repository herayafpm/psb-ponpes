<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Program extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'program_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'program_nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
		]);
		$this->forge->addKey('program_id', true);
		$this->forge->createTable('program');
	}

	public function down()
	{
		$this->forge->dropTable('program');
	}
}
