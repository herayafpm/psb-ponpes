<?php

namespace App\Controllers\Admin;

use App\Models\SoalModel;

class Soal extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'admin/soal/index';
    $data['_uri_datatable'] = base_url("admin/soal/datatable");
    $data['_uri_edit'] = base_url("admin/soal/edit");
    $data['_uri_hapus'] = base_url("admin/soal/hapus");
    $data['_uri_tambah'] = base_url("admin/soal/tambah");
    $data['_scroll_datatable'] = "350px";
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    return view($data['view'], $data);
  }
  public function tambah()
  {
    $data['view'] = 'admin/soal/tambah';
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
      'soal_soal' => htmlspecialchars($this->request->getPost('soal_soal')),
      'soal_a' => htmlspecialchars($this->request->getPost('soal_a')),
      'soal_b' => htmlspecialchars($this->request->getPost('soal_b')),
      'soal_c' => htmlspecialchars($this->request->getPost('soal_c')),
      'soal_d' => htmlspecialchars($this->request->getPost('soal_d')),
      'soal_kunci' => htmlspecialchars($this->request->getPost('soal_kunci')),
      'soal_aktif' => htmlspecialchars($this->request->getPost('soal_aktif') ?? 0),
    ];
    $rule = [
      'soal_soal' => [
        'label'  => 'Soal',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_a' => [
        'label'  => 'Jawaban A',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_b' => [
        'label'  => 'Jawaban B',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_c' => [
        'label'  => 'Jawaban C',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_d' => [
        'label'  => 'Jawaban D',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_kunci' => [
        'label'  => 'Kunci Jawaban',
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
      $soalModel = new SoalModel();
      if ($soalModel->save($data)) {
        $this->session->setFlashdata('success', 'Berhasil menambah soal');
        return redirect()->to(base_url("admin/soal"));
      } else {
        $this->session->setFlashdata('error', 'Gagal menambah soal');
        return redirect()->back()->withInput();
      }
    }
  }
  public function edit($soal_id)
  {
    $data['view'] = 'admin/soal/edit';
    $soalModel = new SoalModel();
    $soal = $soalModel->find($soal_id);
    if (!$soal) {
      $this->session->setFlashdata('error', 'soal tidak ditemukan');
      return redirect()->to(base_url("admin/soal"));
    }
    $data['_soal'] = $soal;
    $data['_validation'] = $this->form_validation;
    $data = array_merge($data, $this->data);
    $method = $this->request->getMethod();
    if ($method == 'post') {
      return $this->processEdit($soal_id);
    } else {
      return view($data['view'], $data);
    }
  }
  function processEdit($soal_id)
  {
    $data = [
      'soal_soal' => htmlspecialchars($this->request->getPost('soal_soal')),
      'soal_a' => htmlspecialchars($this->request->getPost('soal_a')),
      'soal_b' => htmlspecialchars($this->request->getPost('soal_b')),
      'soal_c' => htmlspecialchars($this->request->getPost('soal_c')),
      'soal_d' => htmlspecialchars($this->request->getPost('soal_d')),
      'soal_kunci' => htmlspecialchars($this->request->getPost('soal_kunci')),
      'soal_aktif' => htmlspecialchars($this->request->getPost('soal_aktif') ?? 0),
    ];
    $rule = [
      'soal_soal' => [
        'label'  => 'Soal',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_a' => [
        'label'  => 'Jawaban A',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_b' => [
        'label'  => 'Jawaban B',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_c' => [
        'label'  => 'Jawaban C',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_d' => [
        'label'  => 'Jawaban D',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'soal_kunci' => [
        'label'  => 'Kunci Jawaban',
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
      $soalModel = new SoalModel();
      if ($soalModel->update($soal_id, $data)) {
        $this->session->setFlashdata('success', 'Berhasil mengupdate soal');
        return redirect()->to(base_url("admin/soal"));
      } else {
        $this->session->setFlashdata('error', 'Gagal mengupdate soal');
        return redirect()->back()->withInput();
      }
    }
  }

  public function hapus($soal_id)
  {
    $soalModel = new SoalModel();
    $soal = $soalModel->find($soal_id);
    if (!$soal) {
      $this->session->setFlashdata('error', 'soal tidak ditemukan');
      return redirect()->to(base_url("admin/soal"));
    }
    if ($soalModel->delete($soal_id)) {
      $this->session->setFlashdata('success', 'Berhasil menghapus soal');
      return redirect()->to(base_url("admin/soal"));
    } else {
      $this->session->setFlashdata('error', 'Gagal menghapus soal');
      return redirect()->back()->withInput();
    }
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $soalModel = new SoalModel();
      $where = null;
      $like = null;
      if (!empty($this->request->getPost('soal_soal'))) {
        $like['soal.soal_soal'] = htmlspecialchars($this->request->getPost('soal_soal'));
      }
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($soalModel, $params);
    } else {
      return redirect()->back();
    }
  }

  //--------------------------------------------------------------------

}
