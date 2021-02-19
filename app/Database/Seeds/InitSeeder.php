<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
  public function run()
  {
    $this->call('RoleSeeder');
    $this->call('PenggunaSeeder');
    $this->call('PendaftaranSeeder');
    $this->call('KelasSeeder');
    $this->call('ProgramSeeder');
    $this->call('ProvinsiSeeder');
    $this->call('KabupatenSeeder');
    $this->call('KecamatanSeeder');
    $this->call('SoalSeeder');
  }
}
