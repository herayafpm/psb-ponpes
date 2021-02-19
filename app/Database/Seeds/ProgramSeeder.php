<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
  public function run()
  {
    $initDatas = [
      [
        "program_nama" => "Bahasa Arab",
      ],
      [
        "program_nama" => "Bahasa Inggris",
      ],
      [
        "program_nama" => "Kitab",
      ],
      [
        "program_nama" => "Tahfidz",
      ],
    ];
    $this->db->table('program')->insertBatch($initDatas);
  }
}
