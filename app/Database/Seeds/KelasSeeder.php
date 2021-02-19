<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
  public function run()
  {
    $initDatas = [
      [
        "kelas_nama" => "Diniyah Kelas 1",
        "kelas_mulai" => 0,
        "kelas_selesai" => 50,
      ],
      [
        "kelas_nama" => "Diniyah Kelas 2",
        "kelas_mulai" => 51,
        "kelas_selesai" => 80,
      ],
      [
        "kelas_nama" => "Diniyah Kelas 3",
        "kelas_mulai" => 81,
        "kelas_selesai" => 100,
      ],
    ];
    $this->db->table('kelas')->insertBatch($initDatas);
  }
}
