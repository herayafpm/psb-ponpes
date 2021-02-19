<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;

class AppInstall extends BaseCommand
{
  protected $group       = 'custom';
  protected $name        = 'app:install';
  protected $description = 'Instalasi Aplikasi Codeigniter';

  public function run(array $params)
  {
    echo command('migrate:refresh');
    echo command('db:seed InitSeeder');
    $files = glob(FCPATH . 'uploads/ktp/*'); // get all file names
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file
      }
    }
    $files = glob(FCPATH . 'uploads/kk/*'); // get all file names
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file
      }
    }
    $files = glob(FCPATH . 'uploads/foto/*'); // get all file names
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file
      }
    }
    $files = glob(FCPATH . 'uploads/pembayaran/*'); // get all file names
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file
      }
    }
  }
}
