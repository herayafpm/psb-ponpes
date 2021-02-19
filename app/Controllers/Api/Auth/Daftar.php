<?php

namespace App\Controllers\Api\Auth;

use CodeIgniter\RESTful\ResourceController;

class Daftar extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\PenggunaModel';
  public function index()
  {
    $dataPost = $this->request->getPost();
    try {
      $data = [
        'pengguna_nik' => htmlspecialchars($dataPost['nik']),
        'pengguna_nama' => htmlspecialchars($dataPost['nama']),
        'pengguna_email' => htmlspecialchars($dataPost['email']),
        'pengguna_password' => htmlspecialchars($dataPost['password']),
      ];
      $pengguna = $this->model->getPenggunaByNIK($data['pengguna_nik']);
      if ($pengguna) {
        return $this->respond(["status" => 0, "message" => "nik sudah terdaftar", "data" => []], 200);
      } else {
        $data['role_id'] = 3;
        if ($this->model->save($data)) {
          return $this->respond(["status" => 1, "message" => "berhasil mendaftar, silahkan login", "data" => []], 200);
        } else {
          return $this->respond(["status" => 0, "message" => "gagal mendaftar, silahkan ulangi kembali", "data" => []], 200);
        }
      }
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => $dataPost], 500);
    }
  }
}
