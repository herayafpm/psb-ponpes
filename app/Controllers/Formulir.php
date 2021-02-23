<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PendaftarSantriModel;
use App\Models\ProgramModel;
use App\Models\PenggunaModel;
use App\Models\ProvinsiModel;

class Formulir extends BaseController
{
  protected $form_validation = null;
  public function __construct()
  {
    helper('form');
    $this->form_validation =  \Config\Services::validation();
  }
  public function index()
  {
    helper('my');
    $pendaftaranModel = new PendaftaranModel();
    $pendaftaran = $pendaftaranModel->where(['pendaftaran_status' => 1])->first();
    if ($pendaftaran) {
      $todays_date = date('Y-m-d H:i:s');
      $start_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_mulai']));
      $end_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_selesai']));
      $pendaftarSantriModel = new PendaftarSantriModel();
      $pendaftarSantri = $pendaftarSantriModel->getPendaftarSantri($this->request->pengguna->pengguna_id);
      if ($todays_date >= $start_date && $todays_date <= $end_date && $pendaftarSantri == null) {
        $programModel = new ProgramModel();
        $programs = $programModel->findAll();
        $data['_validation'] = $this->form_validation;
        $data['_pendaftar_santri'] = $pendaftarSantri;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['todays_date'] = $todays_date;
        $data['view'] = 'formulir';
        $provinsiModel = new ProvinsiModel();
        $data['_provinsis'] = $provinsiModel->findAll();
        $data['_programs'] = $programs;
        $data['_pengguna'] = $this->request->pengguna;
        $data['_session'] = $this->session;
        $method = $this->request->getMethod();
        if ($method == "post") {
          return $this->process($pendaftaran['pendaftaran_id']);
        } else {
          return view($data['view'], $data);
        }
      } else {
        return redirect()->to(base_url(''));
      }
    } else {
      return redirect()->to(base_url(''));
    }
  }
  function process($pendaftaran_id)
  {
    $pengguna = $this->request->pengguna;
    $pengguna_id = $pengguna->pengguna_id;
    $data = [
      'pengguna_nama' => htmlspecialchars($this->request->getPost('pengguna_nama')),
      'pendaftar_santri_jk' => htmlspecialchars($this->request->getPost('pendaftar_santri_jk')),
      'pendaftar_santri_tempat_lahir' => htmlspecialchars($this->request->getPost('pendaftar_santri_tempat_lahir')),
      'pendaftar_santri_tgl_lahir' => htmlspecialchars($this->request->getPost('pendaftar_santri_tgl_lahir')),
      'pendaftar_santri_goldar' => htmlspecialchars($this->request->getPost('pendaftar_santri_goldar')),
      'pendaftar_santri_anak_ke' => htmlspecialchars($this->request->getPost('pendaftar_santri_anak_ke')),
      'pendaftar_santri_jml_sdr' => htmlspecialchars($this->request->getPost('pendaftar_santri_jml_sdr')),
      'pendaftar_santri_notelp' => htmlspecialchars($this->request->getPost('pendaftar_santri_notelp')),
      'pendaftar_santri_hobi' => htmlspecialchars($this->request->getPost('pendaftar_santri_hobi')),
      'pendaftar_santri_cita' => htmlspecialchars($this->request->getPost('pendaftar_santri_cita')),
      'pendaftar_santri_asal_sekolah' => htmlspecialchars($this->request->getPost('pendaftar_santri_asal_sekolah')),
      'pendaftar_santri_alamat' => htmlspecialchars($this->request->getPost('pendaftar_santri_alamat')),
      'pendaftar_santri_ktp' => htmlspecialchars($this->request->getPost('pendaftar_santri_ktp')),
      'pendaftar_santri_kk' => htmlspecialchars($this->request->getPost('pendaftar_santri_kk')),
      'pendaftar_santri_prestasi' => htmlspecialchars($this->request->getPost('pendaftar_santri_prestasi')),
      'pendaftar_santri_foto' => htmlspecialchars($this->request->getPost('pendaftar_santri_foto')),
      'pendaftar_santri_pembayaran' => htmlspecialchars($this->request->getPost('pendaftar_santri_pembayaran')),
      'program_id' => htmlspecialchars($this->request->getPost('program_id')),
      'provinsi_id' => htmlspecialchars($this->request->getPost('provinsi_id') ?? ''),
      'kabupaten_id' => htmlspecialchars($this->request->getPost('kabupaten_id') ?? ''),
      'kecamatan_id' => htmlspecialchars($this->request->getPost('kecamatan_id') ?? ''),
      'pendaftar_santri_nama_ayah' => htmlspecialchars($this->request->getPost('pendaftar_santri_nama_ayah')),
      'pendaftar_santri_nama_ibu' => htmlspecialchars($this->request->getPost('pendaftar_santri_nama_ibu')),
      'pendaftar_santri_kerja_ayah' => htmlspecialchars($this->request->getPost('pendaftar_santri_kerja_ayah')),
      'pendaftar_santri_kerja_ibu' => htmlspecialchars($this->request->getPost('pendaftar_santri_kerja_ibu')),
      'pendaftar_santri_alamat_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_alamat_ortu')),
      'pendaftar_santri_penghasilan_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_penghasilan_ortu')),
      'pendaftar_santri_notelp_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_notelp_ortu')),
      'persetujuan' => htmlspecialchars($this->request->getPost('persetujuan')),
    ];
    $data['kabupaten_id'] = $data['kabupaten_id'] == 0 ? "" : $data['kabupaten_id'];
    $data['kecamatan_id'] = $data['kecamatan_id'] == 0 ? "" : $data['kecamatan_id'];
    $rule = [
      'pengguna_nama' => [
        'label'  => 'Nama Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_jk' => [
        'label'  => 'Jenis Kelamin Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_tempat_lahir' => [
        'label'  => 'Tempat Lahir Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_tgl_lahir' => [
        'label'  => 'Tanggal Lahir Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_goldar' => [
        'label'  => 'Golongan Darah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_anak_ke' => [
        'label'  => 'Anak Ke- ',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_jml_sdr' => [
        'label'  => 'Jumlah Saudara Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_notelp' => [
        'label'  => 'No Telp Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_hobi' => [
        'label'  => 'Hobi Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_cita' => [
        'label'  => 'Cita - Cita Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_asal_sekolah' => [
        'label'  => 'Asal Sekolah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_alamat' => [
        'label'  => 'Alamat Lengkap Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_ktp' => [
        'label'  => 'Kartu Tanda Pengenal (KTP) Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_ktp]|mime_in[pendaftar_santri_ktp,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_ktp,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_kk' => [
        'label'  => 'Kartu Keluarga (KK) Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_kk]|mime_in[pendaftar_santri_kk,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_kk,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_foto' => [
        'label'  => 'Foto 3x4 Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_foto]|mime_in[pendaftar_santri_foto,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_foto,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_pembayaran' => [
        'label'  => 'Bukti Pembayaran Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_pembayaran]|mime_in[pendaftar_santri_pembayaran,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_pembayaran,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'program_id' => [
        'label'  => 'Program',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'provinsi_id' => [
        'label'  => 'Provinsi',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kabupaten_id' => [
        'label'  => 'Kabupaten',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kecamatan_id' => [
        'label'  => 'Kecamatan',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_nama_ayah' => [
        'label'  => 'Nama Ayah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_nama_ibu' => [
        'label'  => 'Nama Ibu Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_kerja_ayah' => [
        'label'  => 'Pekerjaan Ayah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_kerja_ibu' => [
        'label'  => 'Pekerjaan Ibu Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_alamat_ortu' => [
        'label'  => 'Alamat Orang Tua Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_penghasilan_ortu' => [
        'label'  => 'Penghasilan Orang Tua',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_notelp_ortu' => [
        'label'  => 'No Telp Orang Tua',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'persetujuan' => [
        'label'  => 'Persetujuan',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} harus di centang',
        ]
      ],
    ];
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    }
    $ktp = $this->request->getFile('pendaftar_santri_ktp');
    $kk = $this->request->getFile('pendaftar_santri_kk');
    $foto = $this->request->getFile('pendaftar_santri_foto');
    $pembayaran = $this->request->getFile('pendaftar_santri_pembayaran');
    $ktpName = $ktp->getRandomName();
    $kkName = $kk->getRandomName();
    $fotoName = $foto->getRandomName();
    $pembayaranName = $pembayaran->getRandomName();
    $ktp->move(FCPATH . 'uploads/ktp', $ktpName);
    $kk->move(FCPATH . 'uploads/kk', $kkName);
    $foto->move(FCPATH . 'uploads/foto', $fotoName);
    $pembayaran->move(FCPATH . 'uploads/pembayaran', $pembayaranName);
    $data['pendaftar_santri_ktp'] = $ktpName;
    $data['pendaftar_santri_kk'] = $kkName;
    $data['pendaftar_santri_foto'] = $fotoName;
    $data['pendaftar_santri_pembayaran'] = $pembayaranName;
    $data['pendaftaran_id'] = $pendaftaran_id;
    $data['pengguna_id'] = $pengguna_id;
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->save($data)) {
      $penggunaModel = new PenggunaModel();
      $penggunaModel->update($pengguna_id, ['pengguna_nama' => $data['pengguna_nama']]);
      $this->session->setFlashdata('success', 'Formulir berhasil diisi');
      return redirect()->to(base_url('dashboard_santri'));
    } else {
      $this->session->setFlashdata('error', 'Formulir gagal diisi');
      return redirect()->back()->withInput();
    }
  }
  public function edit_form()
  {
    helper('my');
    $pendaftaranModel = new PendaftaranModel();
    $pendaftaran = $pendaftaranModel->where(['pendaftaran_status' => 1])->first();
    $todays_date = date('Y-m-d H:i:s');
    $start_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_mulai']));
    $end_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_selesai']));
    $pendaftarSantriModel = new PendaftarSantriModel();
    $pendaftarSantri = $pendaftarSantriModel->getPendaftarSantri($this->request->pengguna->pengguna_id);
    if ($pendaftarSantri['pendaftar_santri_status'] == 1) {
      return redirect()->to(base_url(''));
    }
    $programModel = new ProgramModel();
    $programs = $programModel->findAll();
    $data['_validation'] = $this->form_validation;
    $data['_pendaftar_santri'] = $pendaftarSantri;
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;
    $data['todays_date'] = $todays_date;
    $data['view'] = 'edit_formulir';
    $provinsiModel = new ProvinsiModel();
    $data['_provinsis'] = $provinsiModel->findAll();
    $data['_programs'] = $programs;
    $data['_pengguna'] = $this->request->pengguna;
    $data['_session'] = $this->session;
    $method = $this->request->getMethod();
    if ($method == "post") {
      return $this->process_edit_form($pendaftarSantri);
    } else {
      return view($data['view'], $data);
    }
  }
  function process_edit_form($pendaftarSantri)
  {
    $pengguna = $this->request->pengguna;
    $pengguna_id = $pengguna->pengguna_id;
    $data = [
      'pengguna_nama' => htmlspecialchars($this->request->getPost('pengguna_nama')),
      'pendaftar_santri_jk' => htmlspecialchars($this->request->getPost('pendaftar_santri_jk')),
      'pendaftar_santri_tempat_lahir' => htmlspecialchars($this->request->getPost('pendaftar_santri_tempat_lahir')),
      'pendaftar_santri_tgl_lahir' => htmlspecialchars($this->request->getPost('pendaftar_santri_tgl_lahir')),
      'pendaftar_santri_goldar' => htmlspecialchars($this->request->getPost('pendaftar_santri_goldar')),
      'pendaftar_santri_anak_ke' => htmlspecialchars($this->request->getPost('pendaftar_santri_anak_ke')),
      'pendaftar_santri_jml_sdr' => htmlspecialchars($this->request->getPost('pendaftar_santri_jml_sdr')),
      'pendaftar_santri_notelp' => htmlspecialchars($this->request->getPost('pendaftar_santri_notelp')),
      'pendaftar_santri_hobi' => htmlspecialchars($this->request->getPost('pendaftar_santri_hobi')),
      'pendaftar_santri_cita' => htmlspecialchars($this->request->getPost('pendaftar_santri_cita')),
      'pendaftar_santri_asal_sekolah' => htmlspecialchars($this->request->getPost('pendaftar_santri_asal_sekolah')),
      'pendaftar_santri_alamat' => htmlspecialchars($this->request->getPost('pendaftar_santri_alamat')),
      'pendaftar_santri_ktp' => htmlspecialchars($this->request->getPost('pendaftar_santri_ktp')),
      'pendaftar_santri_kk' => htmlspecialchars($this->request->getPost('pendaftar_santri_kk')),
      'pendaftar_santri_prestasi' => htmlspecialchars($this->request->getPost('pendaftar_santri_prestasi')),
      'pendaftar_santri_foto' => htmlspecialchars($this->request->getPost('pendaftar_santri_foto')),
      'pendaftar_santri_pembayaran' => htmlspecialchars($this->request->getPost('pendaftar_santri_pembayaran')),
      'program_id' => htmlspecialchars($this->request->getPost('program_id')),
      'provinsi_id' => htmlspecialchars($this->request->getPost('provinsi_id')),
      'kabupaten_id' => htmlspecialchars($this->request->getPost('kabupaten_id')),
      'kecamatan_id' => htmlspecialchars($this->request->getPost('kecamatan_id')),
      'pendaftar_santri_nama_ayah' => htmlspecialchars($this->request->getPost('pendaftar_santri_nama_ayah')),
      'pendaftar_santri_nama_ibu' => htmlspecialchars($this->request->getPost('pendaftar_santri_nama_ibu')),
      'pendaftar_santri_kerja_ayah' => htmlspecialchars($this->request->getPost('pendaftar_santri_kerja_ayah')),
      'pendaftar_santri_kerja_ibu' => htmlspecialchars($this->request->getPost('pendaftar_santri_kerja_ibu')),
      'pendaftar_santri_alamat_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_alamat_ortu')),
      'pendaftar_santri_penghasilan_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_penghasilan_ortu')),
      'pendaftar_santri_notelp_ortu' => htmlspecialchars($this->request->getPost('pendaftar_santri_notelp_ortu')),
      'persetujuan' => htmlspecialchars($this->request->getPost('persetujuan')),
    ];
    $data['kabupaten_id'] = $data['kabupaten_id'] == 0 ? "" : $data['kabupaten_id'];
    $data['kecamatan_id'] = $data['kecamatan_id'] == 0 ? "" : $data['kecamatan_id'];
    $rule = [
      'pengguna_nama' => [
        'label'  => 'Nama Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_jk' => [
        'label'  => 'Jenis Kelamin Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_tempat_lahir' => [
        'label'  => 'Tempat Lahir Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_tgl_lahir' => [
        'label'  => 'Tanggal Lahir Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_goldar' => [
        'label'  => 'Golongan Darah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_anak_ke' => [
        'label'  => 'Anak Ke- ',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_jml_sdr' => [
        'label'  => 'Jumlah Saudara Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_notelp' => [
        'label'  => 'No Telp Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_hobi' => [
        'label'  => 'Hobi Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_cita' => [
        'label'  => 'Cita - Cita Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_asal_sekolah' => [
        'label'  => 'Asal Sekolah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_alamat' => [
        'label'  => 'Alamat Lengkap Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'program_id' => [
        'label'  => 'Program',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'provinsi_id' => [
        'label'  => 'Provinsi',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kabupaten_id' => [
        'label'  => 'Kabupaten',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'kecamatan_id' => [
        'label'  => 'Kecamatan',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_nama_ayah' => [
        'label'  => 'Nama Ayah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_nama_ibu' => [
        'label'  => 'Nama Ibu Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_kerja_ayah' => [
        'label'  => 'Pekerjaan Ayah Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_kerja_ibu' => [
        'label'  => 'Pekerjaan Ibu Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_alamat_ortu' => [
        'label'  => 'Alamat Orang Tua Pendaftar',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_penghasilan_ortu' => [
        'label'  => 'Penghasilan Orang Tua',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'pendaftar_santri_notelp_ortu' => [
        'label'  => 'No Telp Orang Tua',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'persetujuan' => [
        'label'  => 'Persetujuan',
        'rules'  => "required",
        'errors' => [
          'required' => '{field} harus di centang',
        ]
      ],
    ];
    $ktp = $this->request->getFile('pendaftar_santri_ktp');
    $kk = $this->request->getFile('pendaftar_santri_kk');
    $foto = $this->request->getFile('pendaftar_santri_foto');
    $pembayaran = $this->request->getFile('pendaftar_santri_pembayaran');
    if ($ktp->isValid()) {
      $rule['pendaftara_santri_ktp'] = [
        'label'  => 'Kartu Tanda Pengenal (KTP) Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_ktp]|mime_in[pendaftar_santri_ktp,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_ktp,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ];
    } else {
      unset($data['pendaftar_santri_ktp']);
    }
    if ($kk->isValid()) {
      $rule['pendaftar_santri_kk'] = [
        'label'  => 'Kartu Keluarga (KK) Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_kk]|mime_in[pendaftar_santri_kk,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_kk,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ];
    } else {
      unset($data['pendaftar_santri_kk']);
    }
    if ($foto->isValid()) {
      $rule['pendaftar_santri_foto'] = [
        'label'  => 'Foto 3x4 Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_foto]|mime_in[pendaftar_santri_foto,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_foto,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ];
    } else {
      unset($data['pendaftar_santri_foto']);
    }
    if ($pembayaran->isValid()) {
      $rule['pendaftar_santri_pembayaran'] = [
        'label'  => 'Bukti Pembayaran Pendaftar',
        'rules'  => "uploaded[pendaftar_santri_pembayaran]|mime_in[pendaftar_santri_pembayaran,image/jpg,image/png,image/jpeg]|max_size[pendaftar_santri_pembayaran,2048]",
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ];
    } else {
      unset($data['pendaftar_santri_pembayaran']);
    }
    $this->form_validation->setRules($rule);
    if (!$this->form_validation->run($data)) {
      return redirect()->back()->withInput();
    }
    if ($ktp->isValid()) {
      $ktpName = $ktp->getRandomName();
      $ktp->move(FCPATH . 'uploads/ktp', $ktpName);
      $data['pendaftar_santri_ktp'] = $ktpName;
    }
    if ($kk->isValid()) {
      $kkName = $kk->getRandomName();
      $kk->move(FCPATH . 'uploads/kk', $kkName);
      $data['pendaftar_santri_kk'] = $kkName;
    }
    if ($foto->isValid()) {
      $fotoName = $foto->getRandomName();
      $foto->move(FCPATH . 'uploads/foto', $fotoName);
      $data['pendaftar_santri_foto'] = $fotoName;
    }
    if ($pembayaran->isValid()) {
      $pembayaranName = $pembayaran->getRandomName();
      $pembayaran->move(FCPATH . 'uploads/pembayaran', $pembayaranName);
      $data['pendaftar_santri_pembayaran'] = $pembayaranName;
    }
    $pendaftarSantriModel = new PendaftarSantriModel();
    if ($pendaftarSantriModel->where(['pengguna_id' => $pengguna_id])->set($data)->update()) {
      $penggunaModel = new PenggunaModel();
      $penggunaModel->update($pengguna_id, ['pengguna_nama' => $data['pengguna_nama']]);
      if (isset($data['pendaftar_santri_ktp']) && $pendaftarSantri['pendaftar_santri_ktp'] != $data['pendaftar_santri_ktp']) {
        $path = FCPATH . "uploads\ktp\\" . $pendaftarSantri['pendaftar_santri_ktp'];
        if (file_exists($path)) {
          unlink($path);
        }
      }
      if (isset($data['pendaftar_santri_kk']) && $pendaftarSantri['pendaftar_santri_kk'] != $data['pendaftar_santri_kk']) {
        $path = FCPATH . "uploads\kk\\" . $pendaftarSantri['pendaftar_santri_kk'];
        if (file_exists($path)) {
          unlink($path);
        }
      }
      if (isset($data['pendaftar_santri_foto']) && $pendaftarSantri['pendaftar_santri_foto'] != $data['pendaftar_santri_foto']) {
        $path = FCPATH . "uploads\foto\\" . $pendaftarSantri['pendaftar_santri_foto'];
        if (file_exists($path)) {
          unlink($path);
        }
      }
      if (isset($data['pendaftar_santri_pembayaran']) && $pendaftarSantri['pendaftar_santri_pembayaran'] != $data['pendaftar_santri_pembayaran']) {
        $path = FCPATH . "uploads\pembayaran\\" . $pendaftarSantri['pendaftar_santri_pembayaran'];
        if (file_exists($path)) {
          unlink($path);
        }
      }
      $this->session->setFlashdata('success', 'Formulir berhasil diupdate');
      return redirect()->to(base_url('dashboard_santri'));
    } else {
      $this->session->setFlashdata('error', 'Formulir gagal diupdate');
      return redirect()->back()->withInput();
    }
  }
  //--------------------------------------------------------------------

}
