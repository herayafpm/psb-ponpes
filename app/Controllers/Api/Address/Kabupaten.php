<?php

namespace App\Controllers\Api\Address;

use CodeIgniter\RESTful\ResourceController;

class Kabupaten extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\KabupatenModel';
  public function index()
  {
    $dataGet = $this->request->getGet();
    try {
      $data = [
        'provinsi_id' => htmlspecialchars($dataGet['provinsi_id']),
      ];
      $kabupatens = $this->model->where(['provinsi_id' => $data['provinsi_id']])->findAll();
      $datas = [];
      foreach ($kabupatens as $kabupaten) {
        array_push($datas, ['id' => $kabupaten['kabupaten_id'], 'text' => $kabupaten['kabupaten_nama']]);
      }
      return $this->respond(["status" => 1, "message" => "berhasil mengambil kabupaten", "data" => $datas], 200);
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => $dataGet], 500);
    }
  }
}
