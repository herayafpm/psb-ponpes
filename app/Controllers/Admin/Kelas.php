<?php

namespace App\Controllers\Admin;

use App\Models\KelasModel;

class Kelas extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/kelas/index';
    $data['_uri_datatable'] = base_url("admin/kelas/datatable");
    $data['_uri_edit'] = base_url("admin/kelas/edit");
    $data['_uri_hapus'] = base_url("admin/kelas/hapus");
    $data['_uri_tambah'] = base_url("admin/kelas/tambah");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function tambah()
  {
    $data['view'] = 'admin/kelas/tambah';
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->process();
    } else {
      return view($data['view'], $data);
    }
  }
  function process()
  {
    $data = [
      'kelas_nama' => htmlspecialchars($this->request->getPost('kelas_nama')),
      'kelas_mulai' => htmlspecialchars($this->request->getPost('kelas_mulai')),
      'kelas_selesai' => htmlspecialchars($this->request->getPost('kelas_selesai')),
    ];
    $rule = [
      'kelas_nama' => [
        'label'  => 'Nama Kelas',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kelas_mulai' => [
        'label'  => 'Nilai Awal Kelas',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kelas_selesai' => [
        'label'  => 'Nilai Akhir Kelas',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    } else {
      $kelasModel = new KelasModel();
      if ($kelasModel->save($data)) {
        $this->session->setFlashdata('success', 'Berhasil menambah kelas');
        return redirect()->to(base_url("admin/kelas"));
      } else {
        $this->session->setFlashdata('error', 'Gagal menambah kelas');
        return redirect()->back()->withInput();
      }
    }
  }
  public function edit($kelas_id)
  {
    $data['view'] = 'admin/kelas/edit';
    $kelasModel = new KelasModel();
    $kelas = $kelasModel->find($kelas_id);
    if (!$kelas) {
      $this->session->setFlashdata('error', 'Kelas tidak ditemukan');
      return redirect()->to(base_url("admin/kelas"));
    }
    $data['_kelas'] = $kelas;
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->processEdit($kelas_id);
    } else {
      return view($data['view'], $data);
    }
  }
  function processEdit($kelas_id)
  {
    $data = [
      'kelas_nama' => htmlspecialchars($this->request->getPost('kelas_nama')),
      'kelas_mulai' => htmlspecialchars($this->request->getPost('kelas_mulai')),
      'kelas_selesai' => htmlspecialchars($this->request->getPost('kelas_selesai')),
    ];
    $rule = [
      'kelas_nama' => [
        'label'  => 'Nama Kelas',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kelas_mulai' => [
        'label'  => 'Nilai Awal Kelas',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kelas_selesai' => [
        'label'  => 'Nilai Akhir Kelas',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    } else {
      $kelasModel = new KelasModel();
      if ($kelasModel->update($kelas_id, $data)) {
        $this->session->setFlashdata('success', 'Berhasil mengupdate kelas');
        return redirect()->to(base_url("admin/kelas"));
      } else {
        $this->session->setFlashdata('error', 'Gagal mengupdate kelas');
        return redirect()->back()->withInput();
      }
    }
  }

  public function hapus($kelas_id)
  {
    $kelasModel = new KelasModel();
    $kelas = $kelasModel->find($kelas_id);
    if (!$kelas) {
      $this->session->setFlashdata('error', 'Kelas tidak ditemukan');
      return redirect()->to(base_url("admin/kelas"));
    }

    if ($kelasModel->delete($kelas_id)) {
      $this->session->setFlashdata('success', 'Berhasil menghapus kelas');
      return redirect()->to(base_url("admin/kelas"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menghapus kelas');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $kelasModel = new KelasModel();
      $where = null;
      $like = null;
      if (!empty($this->request->getPost('kelas_nama'))) {
        $like['kelas.kelas_nama'] = htmlspecialchars($this->request->getPost('kelas_nama'));
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($kelasModel, $params);
    } else {
      return redirect()->back();
    }
  }

  //--------------------------------------------------------------------

}
