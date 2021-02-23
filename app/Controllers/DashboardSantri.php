<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PendaftarSantriModel;

class DashboardSantri extends BaseController
{
  public function index()
  {
    helper('my');
    $pendaftaranModel = new PendaftaranModel();
    $pendaftaran = $pendaftaranModel->where(['pendaftaran_status' => 1])->first();
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftarSantri = $pendaftarSantriModel->getPendaftarSantri($this->request->pengguna->pengguna_id);
    $todays_date = date('Y-m-d H:i:s');
    $start_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_mulai'] ?? date("Y-m-d H:i:s")));
    $end_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_selesai'] ?? date("Y-m-d H:i:s")));
    $data['_pendaftaran'] = $pendaftaran;
    $data['_pendaftar_santri'] = $pendaftarSantri;
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;
    $data['todays_date'] = $todays_date;
    if ($pendaftaran) {
      $data['jml'] = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id']]);
      $data['jmlcowo'] = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id'], 'pendaftar_santri_jk' => 'Laki - Laki']);
      $data['jmlcewe'] = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id'], 'pendaftar_santri_jk' => 'Perempuan']);
    }
    $data['view'] = 'dashboard_santri';
    $data['_pengguna'] = $this->request->pengguna;
    $data['_session'] = $this->session;
    return view($data['view'], $data);
  }

  //--------------------------------------------------------------------

}
