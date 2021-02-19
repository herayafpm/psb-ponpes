<?php

namespace App\Controllers\Admin\Pendaftar;

use App\Models\PendaftarSantriModel;
use App\Controllers\Admin\BaseController;

class Proses extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/pendaftar/index';
    $data['_uri_datatable'] = base_url("admin/pendaftar/proses/datatable");
    $data['_uri_terima'] = base_url("admin/pendaftar/proses/terima");
    $data['_uri_tolak'] = base_url("admin/pendaftar/proses/tolak");
    $data['_title_header'] = "Proses";
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function terima($pendaftar_santri_id)
  {
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftaranSantri = $pendaftarSantriModel->find($pendaftar_santri_id);
    if (!$pendaftaranSantri) {
      $this->session->setFlashdata('error', 'Santri tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftar/proses"));
    }
    $data = [
      'pendaftar_santri_status' => 1,
      'pendaftar_santri_status_by' => $this->request->admin->pengguna_id,
      'pendaftar_santri_status_at' => date('Y-m-d H:i:s')
    ];
    if ($pendaftarSantriModel->update($pendaftar_santri_id, $data)) {
      $this->session->setFlashdata('success', 'Berhasil menerima santri');
      return redirect()->to(base_url("admin/pendaftar/terima"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menerima santri');
      return redirect()->back()->withInput();
    }
  }
  public function tolak($pendaftar_santri_id)
  {
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftaranSantri = $pendaftarSantriModel->find($pendaftar_santri_id);
    if (!$pendaftaranSantri) {
      $this->session->setFlashdata('error', 'Santri tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftar/proses"));
    }
    $data = [
      'pendaftar_santri_status' => 2,
      'pendaftar_santri_status_by' => $this->request->admin->pengguna_id,
      'pendaftar_santri_status_at' => date('Y-m-d H:i:s')
    ];
    if ($pendaftarSantriModel->update($pendaftar_santri_id, $data)) {
      $this->session->setFlashdata('success', 'Berhasil menolak santri');
      return redirect()->to(base_url("admin/pendaftar/tolak"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menolak santri');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $pendaftarSantriModel = new PendaftarSantriModel();
      $where = ['pendaftar_santri_status' => 0];
      $like = null;
      if (!empty($this->request->getPost('pendaftar_santri_no_daftar'))) {
        $like['pendaftar_santri.pendaftar_santri_no_daftar'] = htmlspecialchars($this->request->getPost('pendaftar_santri_no_daftar'));
      }
      if (!empty($this->request->getPost('pengguna_nik'))) {
        $like['pengguna.pengguna_nik'] = htmlspecialchars($this->request->getPost('pengguna_nik'));
      }
      if (!empty($this->request->getPost('pengguna_nama'))) {
        $like['pengguna.pengguna_nama'] = htmlspecialchars($this->request->getPost('pengguna_nama'));
      }
      if (!empty($this->request->getPost('date'))) {
        $date = explode('/', htmlspecialchars($this->request->getPost('date')));
        $where['pengguna.pengguna_created >='] = $date[0] . " 00:00:00";
        $where['pengguna.pengguna_created <='] = $date[1] . " 23:59:59";
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($pendaftarSantriModel, $params);
    } else {
      return redirect()->back();
    }
  }
}
