<?php

namespace App\Controllers\Admin\Pendaftar;

use App\Models\PendaftaranModel;
use App\Models\PendaftarSantriModel;
use App\Controllers\Admin\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/pendaftar/laporan/index';
    $data['_uri_datatable'] = base_url("admin/pendaftar/laporan/datatable");
    $data['_uri_cetak'] = base_url("admin/pendaftar/laporan/cetak");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $pendaftaranModel = new PendaftaranModel();
      $where = null;
      $like = null;
      if (!empty($this->request->getPost('pendaftaran_tgl_mulai'))) {
        $date = htmlspecialchars($this->request->getPost('pendaftaran_tgl_mulai'));
        $where['pendaftaran.pendaftaran_tgl_mulai <='] = date("Y-m-d H:i:s", strtotime($date . " 00:00:00"));
      }
      if (!empty($this->request->getPost('pendaftaran_tgl_selesai'))) {
        $date = htmlspecialchars($this->request->getPost('pendaftaran_tgl_selesai'));
        $where['pendaftaran.pendaftaran_tgl_selesai >='] = date("Y-m-d H:i:s", strtotime($date . " 23:59:59"));
      }
      if (!empty($this->request->getPost('pendaftaran_periode'))) {
        $like['pendaftaran.pendaftaran_periode'] = htmlspecialchars($this->request->getPost('pendaftaran_periode'));
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($pendaftaranModel, $params);
    } else {
      return redirect()->back();
    }
  }

  public function cetak($pendaftaran_id)
  {
    helper('my');
    $data['view'] = 'admin/pendaftar/laporan/cetak';
    $pendaftaranModel = new PendaftaranModel();
    $pendaftaran = $pendaftaranModel->find($pendaftaran_id);
    $pendaftarSantriModel = new PendaftarSantriModel();
    $data['_total_formulir'] = $pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id])->countAllResults();
    $data['_total_laki'] = $pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri_jk' => 'Laki - Laki'])->countAllResults();
    $data['_total_perempuan'] = $pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri_jk' => 'Perempuan'])->countAllResults();
    $data['_total_terima'] = $pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri_status' => 1])->countAllResults();
    $data['_total_tolak'] = $pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri_status' => 2])->countAllResults();
    $data['pendaftaran'] = $pendaftaran;
    $data['_year_start'] = date('Y', strtotime($pendaftaran['pendaftaran_tgl_mulai']));
    $data['_year_end'] = date("Y", strtotime(date("Y-m-d", strtotime($pendaftaran['pendaftaran_tgl_mulai'])) . " + 365 day"));
    $data['_pendaftar_prosess'] = $pendaftarSantriModel->filter(0, 0, 'pendaftar_santri_id', 'ASC', ['where' => ['pendaftar_santri.pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri.pendaftar_santri_status' => 0]]);
    $data['_pendaftar_terimas'] = $pendaftarSantriModel->filter(0, 0, 'pendaftar_santri_id', 'ASC', ['where' => ['pendaftar_santri.pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri.pendaftar_santri_status' => 1]]);
    $data['_pendaftar_tolaks'] = $pendaftarSantriModel->filter(0, 0, 'pendaftar_santri_id', 'ASC', ['where' => ['pendaftar_santri.pendaftaran_id' => $pendaftaran_id, 'pendaftar_santri.pendaftar_santri_status' => 2]]);
    $data = array_merge($data, $this->data);
    $html = view($data['view'], $data);
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
    return $dompdf->stream('cetak_laporan.pdf');
  }

  //--------------------------------------------------------------------

}
