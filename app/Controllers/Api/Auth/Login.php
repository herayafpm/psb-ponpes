<?php

namespace App\Controllers\Api\Auth;

use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\PenggunaModel';
  public function index()
  {
    $session = \Config\Services::session();
    $dataPost = $this->request->getPost();
    try {
      $data = [
        'username' => htmlspecialchars($dataPost['username']),
        'password' => htmlspecialchars($dataPost['password']),
      ];
      $authPengguna = $this->model->authenticate($data['username'], $data['password']);
      if ($authPengguna) {
        $authPengguna['isLogin'] = true;
        if ($authPengguna['role_id'] != 3) {
          $authPengguna['isAdmin'] = true;
          $data['url'] = base_url('admin');
        } else {
          $data['url'] = base_url('');
        }
        $session->set($authPengguna);
        return $this->respond(["status" => 1, "message" => "berhasil login", "data" => $data], 200);
      } else {
        return $this->respond(["status" => 0, "message" => "username atau password salah", "data" => []], 200);
      }
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => $dataPost], 500);
    }
  }
}
