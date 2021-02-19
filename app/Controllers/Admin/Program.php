<?php

namespace App\Controllers\Admin;

use App\Models\ProgramModel;
use App\Models\PendaftarSantriModel;

class Program extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/program/index';
    $data['_uri_datatable'] = base_url("admin/program/datatable");
    $data['_uri_edit'] = base_url("admin/program/edit");
    $data['_uri_hapus'] = base_url("admin/program/hapus");
    $data['_uri_tambah'] = base_url("admin/program/tambah");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function tambah()
  {
    $data['view'] = 'admin/program/tambah';
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
      'program_nama' => htmlspecialchars($this->request->getPost('program_nama')),
    ];
    $rule = [
      'program_nama' => [
        'label'  => 'Nama Program',
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
      $programModel = new ProgramModel();
      if ($programModel->save($data)) {
        $this->session->setFlashdata('success', 'Berhasil menambah program');
        return redirect()->to(base_url("admin/program"));
      } else {
        $this->session->setFlashdata('error', 'Gagal menambah program');
        return redirect()->back()->withInput();
      }
    }
  }
  public function edit($program_id)
  {
    $data['view'] = 'admin/program/edit';
    $programModel = new ProgramModel();
    $program = $programModel->find($program_id);
    if (!$program) {
      $this->session->setFlashdata('error', 'program tidak ditemukan');
      return redirect()->to(base_url("admin/program"));
    }
    $data['_program'] = $program;
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->processEdit($program_id);
    } else {
      return view($data['view'], $data);
    }
  }
  function processEdit($program_id)
  {
    $data = [
      'program_nama' => htmlspecialchars($this->request->getPost('program_nama')),
    ];
    $rule = [
      'program_nama' => [
        'label'  => 'Nama Program',
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
      $programModel = new ProgramModel();
      if ($programModel->update($program_id, $data)) {
        $this->session->setFlashdata('success', 'Berhasil mengupdate program');
        return redirect()->to(base_url("admin/program"));
      } else {
        $this->session->setFlashdata('error', 'Gagal mengupdate program');
        return redirect()->back()->withInput();
      }
    }
  }

  public function hapus($program_id)
  {
    $programModel = new ProgramModel();
    $program = $programModel->find($program_id);
    if (!$program) {
      $this->session->setFlashdata('error', 'program tidak ditemukan');
      return redirect()->to(base_url("admin/program"));
    }
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->where(['program_id' => $program_id])->first()) {
      $this->session->setFlashdata('error', 'Program tidak bisa dihapus, masih digunakan');
      return redirect()->to(base_url("admin/program"));
    }
    if ($programModel->delete($program_id)) {
      $this->session->setFlashdata('success', 'Berhasil menghapus program');
      return redirect()->to(base_url("admin/program"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menghapus program');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $programModel = new ProgramModel();
      $where = null;
      $like = null;
      if (!empty($this->request->getPost('program_nama'))) {
        $like['program.program_nama'] = htmlspecialchars($this->request->getPost('program_nama'));
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($programModel, $params);
    } else {
      return redirect()->back();
    }
  }

  //--------------------------------------------------------------------

}
