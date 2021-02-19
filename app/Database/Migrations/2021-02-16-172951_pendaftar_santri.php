<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PendaftarSantri extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pendaftar_santri_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'pendaftar_santri_no_daftar'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'pendaftaran_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'pengguna_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'pendaftar_santri_jk'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_alamat'       => [
				'type'           => 'TEXT',
				'null'						=> true
			],
			'kecamatan_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
				'null'						=> true,
			],
			'kabupaten_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
				'null'						=> true,
			],
			'provinsi_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
				'null'						=> true,
			],
			'pendaftar_santri_tempat_lahir'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_tgl_lahir'       => [
				'type'           => 'TIMESTAMP',
				'null'						=> true
			],
			'pendaftar_santri_goldar'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_anak_ke'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'						=> true
			],
			'pendaftar_santri_jml_sdr'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'null'						=> true
			],
			'pendaftar_santri_notelp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_cita'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_hobi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_asal_sekolah'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_prestasi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'program_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
				'null'						=> true
			],
			'pendaftar_santri_nama_ayah'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_nama_ibu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_kerja_ayah'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_kerja_ibu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_alamat_ortu'       => [
				'type'           => 'TEXT',
				'null'						=> true
			],
			'pendaftar_santri_penghasilan_ortu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_ktp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_foto'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_kk'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_pembayaran'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_notelp_ortu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_kelas'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'						=> true
			],
			'pendaftar_santri_status'       => [
				'type'           => 'INT',
				'constraint'     => 1,
				'default' => 0
			],
			'pendaftar_santri_status_by'       => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
				'null'						=> true
			],
			'pendaftar_santri_status_at'       => [
				'type' => 'TIMESTAMP',
				'null'						=> true
			],
			'pendaftar_santri_created'       => [
				'type'           => 'TIMESTAMP',
				'null'						=> true
			],
		]);
		$this->forge->addKey('pendaftar_santri_id', true);
		$this->forge->addForeignKey('pendaftaran_id', 'pendaftaran', 'pendaftaran_id');
		$this->forge->addForeignKey('pengguna_id', 'pengguna', 'pengguna_id');
		$this->forge->addForeignKey('kecamatan_id', 'kecamatan', 'kecamatan_id');
		$this->forge->addForeignKey('kabupaten_id', 'kabupaten', 'kabupaten_id');
		$this->forge->addForeignKey('provinsi_id', 'provinsi', 'provinsi_id');
		$this->forge->addForeignKey('program_id', 'program', 'program_id');
		$this->forge->addForeignKey('pendaftar_santri_status_by', 'pengguna', 'pengguna_id');
		$this->forge->createTable('pendaftar_santri');
	}

	public function down()
	{
		$this->forge->dropTable('pendaftar_santri');
	}
}
