<?php

namespace App\Controllers\Admin;

use App\Models\PendaftaranModel;
use App\Models\PendaftarSantriModel;

class Pendaftaran extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/pendaftaran/index';
    $data['_uri_datatable'] = base_url("admin/pendaftaran/datatable");
    $data['_uri_edit'] = base_url("admin/pendaftaran/edit");
    $data['_uri_hapus'] = base_url("admin/pendaftaran/hapus");
    $data['_uri_aktifkan'] = base_url("admin/pendaftaran/aktifkan");
    $data['_uri_matikan'] = base_url("admin/pendaftaran/matikan");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->process();
    } else {
      return view($data['view'], $data);
    }
  }
  public function edit($pendaftaran_id)
  {
    $data['view'] = 'admin/pendaftaran/edit';
    $pendaftaranModel = new pendaftaranModel();
    $pendaftaran = $pendaftaranModel->find($pendaftaran_id);
    if (!$pendaftaran) {
      $this->session->setFlashdata('error', 'Pendaftaran tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftaran"));
    }
    $data['_pendaftaran'] = $pendaftaran;
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->processEdit($pendaftaran_id);
    } else {
      return view($data['view'], $data);
    }
  }
  function processEdit($pendaftaran_id)
  {
    $data = [
      'pendaftaran_periode' => htmlspecialchars($this->request->getPost('pendaftaran_periode')),
      'pendaftaran_tgl_mulai' => htmlspecialchars($this->request->getPost('pendaftaran_tgl_mulai')),
      'pendaftaran_tgl_selesai' => htmlspecialchars($this->request->getPost('pendaftaran_tgl_selesai')),
      'pendaftaran_kuota' => htmlspecialchars($this->request->getPost('pendaftaran_kuota')),
    ];
    $rule = [
      'pendaftaran_periode' => [
        'label'  => 'Periode',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftaran_tgl_mulai' => [
        'label'  => 'Batas Awal Pendaftaran',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftaran_tgl_selesai' => [
        'label'  => 'Batas Akhir Pendaftaran',
        'rules'  => "required|date_less_than[{$data['pendaftaran_tgl_mulai']}]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'date_less_than' => '{field} harus lebih dari tanggal batas awal pendaftaran',
        ]
      ],
      'pendaftaran_kuota' => [
        'label'  => 'Kuota',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    } else {
      $pendaftaranModel = new PendaftaranModel();
      if ($pendaftaranModel->update($pendaftaran_id, $data)) {
        $this->session->setFlashdata('success', 'Berhasil mengupdate pendaftaran');
        return redirect()->to(base_url("admin/pendaftaran"));
      } else {
        $this->session->setFlashdata('error', 'Gagal mengupdate pendaftaran');
        return redirect()->back()->withInput();
      }
    }
  }
  function process()
  {
    $data = [
      'pendaftaran_periode' => htmlspecialchars($this->request->getPost('pendaftaran_periode')),
      'pendaftaran_tgl_mulai' => htmlspecialchars($this->request->getPost('pendaftaran_tgl_mulai')),
      'pendaftaran_tgl_selesai' => htmlspecialchars($this->request->getPost('pendaftaran_tgl_selesai')),
      'pendaftaran_kuota' => htmlspecialchars($this->request->getPost('pendaftaran_kuota')),
    ];
    $rule = [
      'pendaftaran_periode' => [
        'label'  => 'Periode',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftaran_tgl_mulai' => [
        'label'  => 'Batas Awal Pendaftaran',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftaran_tgl_selesai' => [
        'label'  => 'Batas Akhir Pendaftaran',
        'rules'  => "required|date_less_than[{$data['pendaftaran_tgl_mulai']}]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'date_less_than' => '{field} harus lebih dari tanggal batas awal pendaftaran',
        ]
      ],
      'pendaftaran_kuota' => [
        'label'  => 'Kuota',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    } else {
      $pendaftaranModel = new PendaftaranModel();
      if ($pendaftaranModel->save($data)) {
        $this->session->setFlashdata('success', 'Berhasil menambah pendaftaran');
        return redirect()->to(base_url("admin/pendaftaran"));
      } else {
        $this->session->setFlashdata('error', 'Gagal menambah pendaftaran');
        return redirect()->back()->withInput();
      }
    }
  }
  public function aktifkan($pendaftaran_id)
  {
    $pendaftaranModel = new pendaftaranModel();
    $pendaftaran = $pendaftaranModel->find($pendaftaran_id);
    if (!$pendaftaran) {
      $this->session->setFlashdata('error', 'Pendaftaran tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftaran"));
    }
    if ($pendaftaranModel->where(['pendaftaran_status' => 1])->set(['pendaftaran_status' => 0])->update()) {
      if ($pendaftaranModel->update($pendaftaran_id, ['pendaftaran_status' => 1])) {
        $this->session->setFlashdata('success', 'Berhasil mengaktifkan pendaftaran');
        return redirect()->to(base_url("admin/pendaftaran"));
      }
    } else {
      $this->session->setFlashdata('error', 'Gagal mengaktifkan pendaftaran');
      return redirect()->back()->withInput();
    }
  }
  public function matikan($pendaftaran_id)
  {
    $pendaftaranModel = new pendaftaranModel();
    $pendaftaran = $pendaftaranModel->find($pendaftaran_id);
    if (!$pendaftaran) {
      $this->session->setFlashdata('error', 'Pendaftaran tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftaran"));
    }
    if ($pendaftaranModel->update($pendaftaran_id, ['pendaftaran_status' => 0])) {
      $this->session->setFlashdata('success', 'Berhasil mematikan pendaftaran');
      return redirect()->to(base_url("admin/pendaftaran"));
    } else {
      $this->session->setFlashdata('error', 'Gagal mematikan pendaftaran');
      return redirect()->back()->withInput();
    }
  }
  public function hapus($pendaftaran_id)
  {
    $pendaftaranModel = new pendaftaranModel();
    $pendaftaran = $pendaftaranModel->find($pendaftaran_id);
    if (!$pendaftaran) {
      $this->session->setFlashdata('error', 'Pendaftaran tidak ditemukan');
      return redirect()->to(base_url("admin/pendaftaran"));
    }
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->where(['pendaftaran_id' => $pendaftaran_id])->first()) {
      $this->session->setFlashdata('error', 'Pendaftaran tidak bisa dihapus, masih digunakan');
      return redirect()->to(base_url("admin/pendaftaran"));
    }
    if ($pendaftaranModel->delete($pendaftaran_id)) {
      $this->session->setFlashdata('success', 'Berhasil menghapus pendaftaran');
      return redirect()->to(base_url("admin/pendaftaran"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menghapus pendaftaran');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $pendaftaranModel = new PendaftaranModel();
      $where = null;
      $like = null;
      if ($this->request->getPost('pendaftaran_status') != "") {
        $where['pendaftaran.pendaftaran_status'] = htmlspecialchars($this->request->getPost('pendaftaran_status'));
      }
      if (!empty($this->request->getPost('pendaftaran_tgl_mulai'))) {
        $date = htmlspecialchars($this->request->getPost('pendaftaran_tgl_mulai'));
        $where['pendaftaran.pendaftaran_tgl_mulai'] = date("Y-m-d H:i:s", strtotime($date . " 00:00:00"));
      }
      if (!empty($this->request->getPost('pendaftaran_tgl_selesai'))) {
        $date = htmlspecialchars($this->request->getPost('pendaftaran_tgl_selesai'));
        $where['pendaftaran.pendaftaran_tgl_selesai'] = date("Y-m-d H:i:s", strtotime($date . " 23:59:59"));
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

  //--------------------------------------------------------------------

}
