<?php

namespace App\Validations;

use App\Models\PenggunaModel;

class MyRules
{
  public function old_pass(string $password, $id)
  {
    $penggunaModel = new PenggunaModel();
    $pengguna = $penggunaModel->find($id);
    if (password_verify($password, $pengguna['pengguna_password'])) {
      return true;
    }
    return false;
  }
  public function date_less_than(string $akhir, string $awal)
  {
    if (!empty($akhir) && !empty($awal)) {
      $awal = date("Y-m-d", strtotime($awal));
      $akhir = date("Y-m-d", strtotime($akhir));
      if ($akhir >= $awal) {
        return true;
      }
    }
    return false;
  }
  public function sometime(string $str)
  {
    if (empty($str) || !empty($str)) {
      return true;
    }
    return false;
  }
}
