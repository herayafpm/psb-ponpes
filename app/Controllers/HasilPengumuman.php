<?php

namespace App\Controllers;

use App\Models\PendaftarSantriModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class HasilPengumuman extends BaseController
{
  public function index()
  {
    helper('my');
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftarSantri = $pendaftarSantriModel->getPendaftarSantri($this->request->pengguna->pengguna_id);
    if (!$pendaftarSantri) {
      return redirect()->to(base_url(''));
    }
    $data['_pendaftar_santri'] = $pendaftarSantri;
    $data['view'] = 'hasil_pengumuman';
    $data['_pengguna'] = $this->request->pengguna;
    $data['_session'] = $this->session;
    return view($data['view'], $data);
  }

  public function cetak_formulir()
  {
    helper('my');
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftarSantri = $pendaftarSantriModel->getPendaftarSantri($this->request->pengguna->pengguna_id);
    if (!$pendaftarSantri) {
      return redirect()->to(base_url(''));
    }
    if ($pendaftarSantri['pendaftar_santri_status'] != 1) {
      return redirect()->to(base_url(''));
    }
    $data['_year_start'] = date('Y', strtotime($pendaftarSantri['pendaftaran_tgl_mulai']));
    $data['_year_end'] = date("Y", strtotime(date("Y-m-d", strtotime($pendaftarSantri['pendaftaran_tgl_mulai'])) . " + 365 day"));
    $data['_pendaftar_santri'] = $pendaftarSantri;
    $data['view'] = 'cetak_formulir';
    $data['_pengguna'] = $this->request->pengguna;
    $data['_session'] = $this->session;
    $html = view($data['view'], $data);
    // return $html;
    $dompdf = new Dompdf();
    $options = new Options();
    $options = $dompdf->getOptions();
    $options->setIsRemoteEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    return $dompdf->stream('cetak_formulir.pdf');
  }

  //--------------------------------------------------------------------

}
