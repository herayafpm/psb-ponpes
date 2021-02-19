<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'pengguna';
  protected $primaryKey           = 'pengguna_id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'array';
  protected $useSoftDelete        = false;
  protected $protectFields        = true;
  protected $allowedFields        = ['pengguna_nik', 'pengguna_nama', 'pengguna_email', 'role_id', 'pengguna_password'];

  // Dates
  protected $useTimestamps        = true;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'pengguna_created';
  protected $updatedField         = 'pengguna_updated';
  protected $deletedField         = '';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks       = true;
  protected $beforeInsert         = ['hashPassword'];
  protected $afterInsert          = [];
  protected $beforeUpdate         = ['hashPassword'];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];
  protected function hashPassword(array $data)
  {
    if (!isset($data['data']['pengguna_password'])) return $data;
    $data['data']['pengguna_password'] = password_hash($data['data']['pengguna_password'], PASSWORD_DEFAULT);
    return $data;
  }

  public function filter($limit, $start, $orderBy, $ordered, $params = [])
  {
    $builder = $this->db->table($this->table);
    $builder->orderBy($orderBy, $ordered);
    if ($limit > 0) {
      $builder->limit($limit, $start);
    }
    $builder->select("{$this->table}.*");
    $builder->select("role.*");
    $builder->join('role', "role.role_id = {$this->table}.role_id", 'LEFT');
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
    $builder->select("role.*");
    $builder->join('role', "role.role_id = {$this->table}.role_id", 'LEFT');
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
  public function getPengguna($pengguna_id)
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.*");
    $builder->select("role.*");
    $builder->join('role', "role.role_id = {$this->table}.role_id", 'LEFT');
    $builder->where(['pengguna_id' => $pengguna_id]);
    $query = $builder->get()->getRow();
    return $query;
  }
  public function getPendaftar($pengguna_id)
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.*");
    $builder->select("role.*");
    $builder->join('role', "role.role_id = {$this->table}.role_id", 'LEFT');
    $builder->where(['pengguna_id' => $pengguna_id, 'role.role_id' => 2]);
    $query = $builder->get()->getRow();
    return $query;
  }
  public function getPenggunaByNIK($pengguna_nik)
  {
    $builder = $this->db->table($this->table);
    $builder->select("{$this->table}.*");
    $builder->where(['pengguna_nik' => $pengguna_nik]);
    $query = $builder->get()->getRow();
    return $query;
  }
  public function authenticate($username, $password)
  {
    $auth = $this->where('pengguna_nik', $username)->first();
    if ($auth) {
      if (password_verify($password, $auth['pengguna_password'])) {
        return $auth;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
