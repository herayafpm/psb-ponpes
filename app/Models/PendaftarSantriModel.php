<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarSantriModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'pendaftar_santri';
  protected $primaryKey           = 'pendaftar_santri_id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'array';
  protected $useSoftDelete        = false;
  protected $protectFields        = true;
  protected $allowedFields        = ['pendaftar_santri_no_daftar', 'pendaftaran_id', 'pengguna_id', 'pendaftar_santri_jk', 'pendaftar_santri_alamat', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'pendaftar_santri_tempat_lahir', 'pendaftar_santri_tgl_lahir', 'pendaftar_santri_goldar', 'pendaftar_santri_anak_ke', 'pendaftar_santri_jml_sdr', 'pendaftar_santri_notelp', 'pendaftar_santri_cita', 'pendaftar_santri_hobi', 'pendaftar_santri_asal_sekolah', 'pendaftar_santri_prestasi', 'program_id', 'pendaftar_santri_nama_ayah', 'pendaftar_santri_nama_ibu', 'pendaftar_santri_kerja_ayah', 'pendaftar_santri_kerja_ibu', 'pendaftar_santri_alamat_ortu', 'pendaftar_santri_penghasilan_ortu', 'pendaftar_santri_ktp', 'pendaftar_santri_foto', 'pendaftar_santri_kk', 'pendaftar_santri_pembayaran', 'pendaftar_santri_notelp_ortu', 'pendaftar_santri_kelas', 'pendaftar_santri_status', 'pendaftar_santri_status_by', 'pendaftar_santri_status_at'];

  // Dates
  protected $useTimestamps        = true;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'pendaftar_santri_created';
  protected $updatedField         = '';
  protected $deletedField         = '';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks       = true;
  protected $beforeInsert         = ['getNoDaftar'];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];
  function getNoDaftar(array $datas)
  {
    if (isset($datas['data']['pendaftar_santri_no_daftar'])) return $datas;
    $builder = $this->db->table($this->table);
    $noUrut = "P" . date('Ymd');
    $data = $builder->select('pendaftar_santri_no_daftar')->like('pendaftar_santri_no_daftar', $noUrut)->orderBy($this->primaryKey, 'DESC')->get()->getRowArray();
    if ($data) {
      $noUrut = $data['pendaftar_santri_no_daftar'];
      $str = substr($noUrut, 0, 1);
      $date = substr($noUrut, 1, 8);
      $no = substr($noUrut, 9, 1);
      $no = (int) $no + 1;
      $datas['data']['pendaftar_santri_no_daftar'] = $str . $date . $no;
      return $datas;
    } else {
      $datas['data']['pendaftar_santri_no_daftar'] = $noUrut . "1";
      return $datas;
    }
  }
  public function filter($limit, $start, $orderBy, $ordered, $params = [])
  {
    $builder = $this->db->table($this->table);
    $builder->orderBy($orderBy, $ordered);
    if ($limit > 0) {
      $builder->limit($limit, $start);
    }
    $builder->select("{$this->table}.*");
    $builder->select("pendaftaran.*");
    $builder->select("pengguna.*");
    $builder->select("program.*");
    $builder->select("provinsi.*");
    $builder->select("kabupaten.*");
    $builder->select("kecamatan.*");
    $builder->select("admin.pengguna_nama as admin_nama");
    $builder->join('pendaftaran', "pendaftaran.pendaftaran_id = {$this->table}.pendaftaran_id", 'LEFT');
    $builder->join('provinsi', "provinsi.provinsi_id = {$this->table}.provinsi_id", 'LEFT');
    $builder->join('kabupaten', "kabupaten.kabupaten_id = {$this->table}.kabupaten_id", 'LEFT');
    $builder->join('kecamatan', "kecamatan.kecamatan_id = {$this->table}.kecamatan_id", 'LEFT');
    $builder->join('pengguna', "pengguna.pengguna_id = {$this->table}.pengguna_id", 'LEFT');
    $builder->join('program', "program.program_id = {$this->table}.program_id", 'LEFT');
    $builder->join('pengguna as admin', "admin.pengguna_id = {$this->table}.pendaftar_santri_status_by", 'LEFT');
    if (isset($params['where'])) {
      $builder->where($params['where']);
    }
    if (isset($params['like'])) {
      foreach ($params['like'] as $key => $value) {
        $builder->like($key, $value);
      }
    }
    $datas = $builder->get()->getResultArray();
    return $datas;
  }
  public function count_all($params = [])
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.*");
    $builder->select("pendaftaran.*");
    $builder->select("pengguna.*");
    $builder->select("program.*");
    $builder->select("provinsi.*");
    $builder->select("kabupaten.*");
    $builder->select("kecamatan.*");
    $builder->select("admin.pengguna_nama as admin_nama");
    $builder->join('pendaftaran', "pendaftaran.pendaftaran_id = {$this->table}.pendaftaran_id", 'LEFT');
    $builder->join('provinsi', "provinsi.provinsi_id = {$this->table}.provinsi_id", 'LEFT');
    $builder->join('kabupaten', "kabupaten.kabupaten_id = {$this->table}.kabupaten_id", 'LEFT');
    $builder->join('kecamatan', "kecamatan.kecamatan_id = {$this->table}.kecamatan_id", 'LEFT');
    $builder->join('pengguna', "pengguna.pengguna_id = {$this->table}.pengguna_id", 'LEFT');
    $builder->join('program', "program.program_id = {$this->table}.program_id", 'LEFT');
    $builder->join('pengguna as admin', "admin.pengguna_id = {$this->table}.pendaftar_santri_status_by", 'LEFT');
    if (isset($params['where'])) {
      $builder->where($params['where']);
    }
    if (isset($params['like'])) {
      foreach ($params['like'] as $key => $value) {
        $builder->like($key, $value);
      }
    }
    return $builder->countAllResults();
  }
  public function filter_not_detail($limit, $start, $orderBy, $ordered, $params = [], $search)
  {
    $builder = $this->db->table($this->table);
    $builder->orderBy($orderBy, $ordered);
    if ($limit > 0) {
      $builder->limit($limit, $start);
    }
    $columns = ['pendaftar_santri_id', 'pendaftar_santri_alamat', 'pendaftar_santri_jk', 'pendaftar_santri_status', 'pendaftar_santri_kelas'];
    $no = 0;
    foreach ($columns as $column) {
      $columns[$no] = "{$this->table}.{$column}";
      $no++;
    }
    $columnsPengguna = ['pengguna_nama', 'pengguna_nik'];
    $no = 0;
    foreach ($columnsPengguna as $column) {
      $columnsPengguna[$no] = "pengguna.{$column}";
      $no++;
    }
    $builder->select(implode(",", $columns));
    $builder->select(implode(",", $columnsPengguna));
    $builder->join('pengguna', "pengguna.pengguna_id = {$this->table}.pengguna_id", 'LEFT');
    if (isset($params['where'])) {
      $builder->where($params['where']);
    }
    $no = 0;
    foreach ($columns as $columnThis) {
      if ($no > 0) {
        if ($no == 1) {
          $builder->like($columnThis, $search);
        } else if ($no >= 2 && strpos($columnThis, "pendaftar_santri_status") == false) {
          $builder->orLike($columnThis, $search);
        }
      }
      $no++;
    }
    foreach ($columnsPengguna as $columnPengguna) {
      $builder->orLike($columnPengguna, $search);
    }
    $datas = $builder->get()->getResultArray();
    return $datas;
  }
  public function count_all_not_detail($params = [], $search)
  {
    $builder = $this->db->table($this->table);
    $columns = ['pendaftar_santri_id', 'pendaftar_santri_alamat', 'pendaftar_santri_jk', 'pendaftar_santri_status', 'pendaftar_santri_kelas'];
    $no = 0;
    foreach ($columns as $column) {
      $columns[$no] = "{$this->table}.{$column}";
      $no++;
    }
    $columnsPengguna = ['pengguna_nama', 'pengguna_nik'];
    $no = 0;
    foreach ($columnsPengguna as $column) {
      $columnsPengguna[$no] = "pengguna.{$column}";
      $no++;
    }
    $builder->select(implode(",", $columns));
    $builder->select(implode(",", $columnsPengguna));
    $builder->join('pengguna', "pengguna.pengguna_id = {$this->table}.pengguna_id", 'LEFT');
    if (isset($params['where'])) {
      $builder->where($params['where']);
    }
    $no = 0;
    foreach ($columns as $columnThis) {
      if ($no > 0) {
        if ($no == 1) {
          $builder->like($columnThis, $search);
        } else if ($no >= 2 && strpos($columnThis, "pendaftar_santri_status") == false) {
          $builder->orLike($columnThis, $search);
        }
      }
      $no++;
    }
    foreach ($columnsPengguna as $columnPengguna) {
      $builder->orLike($columnPengguna, $search);
    }
    return $builder->countAllResults();
  }
  public function count_where($where)
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.{$this->primaryKey}");
    $builder->where($where);
    return $builder->countAllResults();
  }
  public function getPendaftarSantri($pengguna_id)
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.*");
    $builder->select("pendaftaran.*");
    $builder->select("pengguna.*");
    $builder->select("program.*");
    $builder->select("provinsi.*");
    $builder->select("kabupaten.*");
    $builder->select("kecamatan.*");
    $builder->select("admin.pengguna_nama as admin_nama");
    $builder->join('pendaftaran', "pendaftaran.pendaftaran_id = {$this->table}.pendaftaran_id", 'LEFT');
    $builder->join('provinsi', "provinsi.provinsi_id = {$this->table}.provinsi_id", 'LEFT');
    $builder->join('kabupaten', "kabupaten.kabupaten_id = {$this->table}.kabupaten_id", 'LEFT');
    $builder->join('kecamatan', "kecamatan.kecamatan_id = {$this->table}.kecamatan_id", 'LEFT');
    $builder->join('pengguna', "pengguna.pengguna_id = {$this->table}.pengguna_id", 'LEFT');
    $builder->join('program', "program.program_id = {$this->table}.program_id", 'LEFT');
    $builder->join('pengguna as admin', "admin.pengguna_id = {$this->table}.pendaftar_santri_status_by", 'LEFT');
    $builder->where(["{$this->table}.pengguna_id" => $pengguna_id]);
    $datas = $builder->get()->getRowArray();
    return $datas;
  }
}
