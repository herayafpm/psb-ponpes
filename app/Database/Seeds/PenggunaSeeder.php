<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
  public function run()
  {
    $password = password_hash(env('cpasswordDefault'), PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $initDatas = [
      [
        "pengguna_nik" => "superadmin",
        "pengguna_nama" => "superadmin",
        "pengguna_email" => "superadmin@test.com",
        'pengguna_password' => $password,
        "role_id"        => 1,
        'pengguna_created' => $date,
        'pengguna_updated' => $date,
      ],
      [
        "pengguna_nik" => "admin",
        "pengguna_nama" => "admin",
        "pengguna_email" => "admin@test.com",
        'pengguna_password' => $password,
        "role_id"        => 2,
        'pengguna_created' => $date,
        'pengguna_updated' => $date,
      ],
      [
        "pengguna_nik" => "330411",
        "pengguna_nama" => "heraya",
        "pengguna_email" => "heraya@test.com",
        'pengguna_password' => $password,
        "role_id"        => 3,
        'pengguna_created' => $date,
        'pengguna_updated' => $date,
      ],
    ];
    $this->db->table('pengguna')->insertBatch($initDatas);
  }
}
