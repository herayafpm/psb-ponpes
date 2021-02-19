<?php

namespace App\Controllers\Api\Auth;

use CodeIgniter\RESTful\ResourceController;

class Logout extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\PenggunaModel';
  public function index()
  {
    $session = \Config\Services::session();
    try {
      $session->destroy();
      $session->setFlashdata('success', 'Anda berhasil logout');
      return $this->respond(["status" => 1, "message" => "berhasil logout", "data" => ['url' => base_url('')]], 200);
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => []], 500);
    }
  }
}
