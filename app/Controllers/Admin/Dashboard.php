<?php

namespace App\Controllers\Admin;

use App\Models\PenggunaModel;
use App\Models\PendaftarSantriModel;

class Dashboard extends BaseController
{
  public function index()
  {
    $data['view'] = 'admin/dashboard';
    $data = array_merge($data, $this->data);
    $penggunaModel = new PenggunaModel();
    $pendaftarSantriModel = new PendaftarSantriModel();
    $data['_total_pendaftar'] = $penggunaModel->where(['role_id' => 3])->countAllResults();
    $data['_total_formulir'] = $pendaftarSantriModel->countAllResults();
    $data['_total_laki'] = $pendaftarSantriModel->where(['pendaftar_santri_jk' => 'Laki - Laki'])->countAllResults();
    $data['_total_perempuan'] = $pendaftarSantriModel->where(['pendaftar_santri_jk' => 'Perempuan'])->countAllResults();
    return view($data['view'], $data);
  }

  //--------------------------------------------------------------------

}
