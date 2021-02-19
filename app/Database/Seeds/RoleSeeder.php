<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run()
  {
    $initDatas = [
      [
        "role_nama" => "superadmin",
      ],
      [
        "role_nama" => "admin",
      ],
      [
        "role_nama" => "santri",
      ],
    ];
    $this->db->table('role')->insertBatch($initDatas);
  }
}
