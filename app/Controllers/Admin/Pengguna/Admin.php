<?php

namespace App\Controllers\Admin\Pengguna;

use App\Models\PenggunaModel;
use App\Models\PendaftarSantriModel;
use App\Controllers\Admin\BaseController;

class Admin extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/pengguna/admin/index';
    $data['_uri_datatable'] = base_url("admin/pengguna/admin/datatable");
    $data['_uri_tambah'] = base_url("admin/pengguna/admin/tambah");
    $data['_uri_edit'] = base_url("admin/pengguna/admin/edit");
    $data['_uri_hapus'] = base_url("admin/pengguna/admin/hapus");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function tambah()
  {
    $data['view'] = 'admin/pengguna/admin/tambah';
    $data['_validation'] = $this->form_validation;
    $method = $this->request->getMethod();
    $data = array_merge($data, $this->data);
    if ($method == 'post') {
      return $this->process();
    } else {
      return view($data['view'], $data);
    }
  }
  function process()
  {
    $data = [
      'pengguna_nik' => htmlspecialchars($this->request->getPost('pengguna_nik')),
      'pengguna_nama' => htmlspecialchars($this->request->getPost('pengguna_nama')),
      'pengguna_email' => htmlspecialchars($this->request->getPost('pengguna_email')),
    ];
    $rule = [
      'pengguna_nik' => [
        'label'  => 'Username Admin',
        'rules'  => 'required|is_unique[pengguna.pengguna_nik]',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'is_unique' => '{field} sudah digunakan, gunakan yang lain',
        ]
      ],
      'pengguna_nama' => [
        'label'  => 'Nama Admin',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pengguna_email' => [
        'label'  => 'Email Admin',
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
      $data['role_id'] = 2;
      $data['pengguna_password'] = env('cpasswordDefault');
      $penggunaModel = new PenggunaModel();
      if ($penggunaModel->save($data)) {
        $this->session->setFlashdata('success', 'Berhasil menambah admin');
        return redirect()->to(base_url("admin/pengguna/admin"));
      } else {
        $this->session->setFlashdata('error', 'Gagal menambah admin');
        return redirect()->back()->withInput();
      }
    }
  }
  public function edit($pengguna_id)
  {
    $data['view'] = 'admin/pengguna/admin/edit';
    $penggunaModel = new PenggunaModel();
    $admin = $penggunaModel->find($pengguna_id);
    if (!$admin) {
      $this->session->setFlashdata('error', 'Admin tidak ditemukan');
      return redirect()->to(base_url("admin/pengguna/admin"));
    }
    if ($admin['role_id'] != 2) {
      $this->session->setFlashdata('error', 'Admin tidak ditemukan');
      return redirect()->to(base_url("admin/pengguna/admin"));
    }
    $data['admin'] = $admin;
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->processEdit($pengguna_id);
    } else {
      return view($data['view'], $data);
    }
  }
  function processEdit($pengguna_id)
  {
    $data = [
      'pengguna_nik' => htmlspecialchars($this->request->getPost('pengguna_nik')),
      'pengguna_nama' => htmlspecialchars($this->request->getPost('pengguna_nama')),
      'pengguna_email' => htmlspecialchars($this->request->getPost('pengguna_email')),
      'pengguna_password' => htmlspecialchars($this->request->getPost('pengguna_password')),
    ];
    $rule = [
      'pengguna_nik' => [
        'label'  => 'Username Admin',
        'rules'  => "required|is_unique[pengguna.pengguna_nik,pengguna_id,{$pengguna_id}]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'is_unique' => '{field} sudah digunakan, gunakan yang lain',
        ]
      ],
      'pengguna_nama' => [
        'label'  => 'Nama Admin',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pengguna_email' => [
        'label'  => 'Email Admin',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pengguna_password' => [
        'label'  => 'Password Baru',
        'rules'  => 'sometime',
        'errors' => [
          'sometime' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    } else {
      if (empty($data['pengguna_password'])) {
        unset($data['pengguna_password']);
      }
      $penggunaModel = new PenggunaModel();
      if ($penggunaModel->update($pengguna_id, $data)) {
        $this->session->setFlashdata('success', 'Berhasil mengupdate admin');
        return redirect()->to(base_url("admin/pengguna/admin"));
      } else {
        $this->session->setFlashdata('error', 'Gagal mengupdate admin');
        return redirect()->back()->withInput();
      }
    }
  }

  public function hapus($pengguna_id)
  {
    $penggunaModel = new penggunaModel();
    $pengguna = $penggunaModel->getpengguna($pengguna_id);
    if (!$pengguna) {
      $this->session->setFlashdata('error', 'admin tidak ditemukan');
      return redirect()->to(base_url("admin/pengguna/santri"));
    }
    if ($pengguna->role_id != 2) {
      $this->session->setFlashdata('error', 'admin tidak ditemukan');
      return redirect()->to(base_url("admin/pengguna/santri"));
    }
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->where(['pendaftar_santri_status_by' => $pengguna_id])->first()) {
      $this->session->setFlashdata('error', 'data admin masih digunakan, tidak bisa dihapus');
      return redirect()->to(base_url("admin/pengguna/admin"));
    }
    if ($penggunaModel->delete($pengguna_id)) {
      $this->session->setFlashdata('success', 'Berhasil menghapus admin');
      return redirect()->to(base_url("admin/pengguna/admin"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menghapus admin');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $penggunaModel = new PenggunaModel();
      $where = ['pengguna.role_id' => 2];
      $like = null;
      if (!empty($this->request->getPost('pengguna_nik'))) {
        $like['pengguna.pengguna_nik'] = htmlspecialchars($this->request->getPost('pengguna_nik'));
      }
      if (!empty($this->request->getPost('pengguna_nama'))) {
        $like['pengguna.pengguna_nama'] = htmlspecialchars($this->request->getPost('pengguna_nama'));
      }
      if (!empty($this->request->getPost('pengguna_email'))) {
        $like['pengguna.pengguna_email'] = htmlspecialchars($this->request->getPost('pengguna_email'));
      }
      if (!empty($this->request->getPost('date'))) {
        $date = explode('/', htmlspecialchars($this->request->getPost('date')));
        $where['pengguna.pengguna_created >='] = $date[0] . " 00:00:00";
        $where['pengguna.pengguna_created <='] = $date[1] . " 23:59:59";
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($penggunaModel, $params);
    } else {
      return redirect()->back();
    }
  }

  //--------------------------------------------------------------------

}
