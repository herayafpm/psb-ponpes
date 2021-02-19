<?php

namespace App\Controllers\Api\Address;

use CodeIgniter\RESTful\ResourceController;

class Kecamatan extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\KecamatanModel';
  public function index()
  {
    $dataGet = $this->request->getGet();
    try {
      $data = [
        'kabupaten_id' => htmlspecialchars($dataGet['kabupaten_id']),
      ];
      $kecamatans = $this->model->where(['kabupaten_id' => $data['kabupaten_id']])->findAll();
      $datas = [];
      foreach ($kecamatans as $kecamatan) {
        array_push($datas, ['id' => $kecamatan['kecamatan_id'], 'text' => $kecamatan['kecamatan_nama']]);
      }
      return $this->respond(["status" => 1, "message" => "berhasil mengambil kecamatan", "data" => $datas], 200);
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => $dataGet], 500);
    }
  }
}
