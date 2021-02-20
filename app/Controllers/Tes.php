<?php

namespace App\Controllers;

use App\Models\PendaftarSantriModel;
use App\Models\SoalModel;
use App\Models\KelasModel;

class Tes extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    $data['view'] = 'tes';
    $data['_session'] = $this->session;
    $data['_validation'] = $this->form_validation;
    $soalModel = new SoalModel();
    $soals = $soalModel->where(['soal_aktif' => 1])->findAll();
    $data['_soals'] = $soals;
    $method = $this->request->getMethod();
    if ($method == "post") {
      return $this->process($soals);
    } else {
      return view($data['view'], $data);
    }
  }
  function process($soals)
  {
    $pengguna = $this->request->pengguna;
    $pengguna_id = $pengguna->pengguna_id;
    $soal_id = array_column($soals, 'soal_id');
    $kunci_jawaban = array_column($soals, 'soal_kunci');
    $jawaban = $this->request->getPost('jawaban');
    if (sizeof($jawaban) != sizeof($soal_id)) {
      $this->session->setFlashdata('error', 'Silahkan isi semua jawaban');
      return redirect()->back()->withInput();
    }
    $benar = 0;
    $salah = 0;
    $no = 0;
    foreach ($soal_id as $id) {
      if ($jawaban[$id] == $kunci_jawaban[$no]) {
        $benar += 1;
      } else {
        $salah += 1;
      }
      $no++;
    }
    $hasil = (int) (100 / sizeof($soal_id) * $benar);
    $kelasModel = new KelasModel();
    $kelas = $kelasModel->getKelas(['where' => ['kelas_mulai <=' => $hasil, 'kelas_selesai >=' => $hasil]]);
    // $kelas_nama = $kelas['kelas_nama'];
    // var_dump($benar);
    // var_dump($salah);
    // var_dump($hasil);
    // var_dump($kelas_nama);
    // die();
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->where(['pengguna_id' => $pengguna_id])->set(['pendaftar_santri_kelas' => $kelas['kelas_nama']])->update()) {
      $this->session->setFlashdata('success', 'Berhasil menyelesaikan tes, harap tunggu admin untuk verifikasi');
      return redirect()->to(base_url(''));
    } else {
      $this->session->setFlashdata('error', 'Gagal menyelesaikan tes, harap ulangi kembali');
      return redirect()->back()->withInput();
    }
  }

  //--------------------------------------------------------------------

}
