<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
  public function run()
  {
    $initDatas = [
      [
        "pendaftaran_periode" => "feb - maret",
        "pendaftaran_tgl_mulai" => date("Y-m-d H:i:s", strtotime("2021-02-16 00:00:00")),
        "pendaftaran_tgl_selesai" => date("Y-m-d H:i:s", strtotime("2021-03-16 23:59:59")),
        "pendaftaran_kuota" => 100,
        "pendaftaran_status" => 1,
      ],
    ];
    $this->db->table('pendaftaran')->insertBatch($initDatas);
  }
}
