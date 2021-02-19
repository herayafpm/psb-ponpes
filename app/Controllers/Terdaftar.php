<?php

namespace App\Controllers;

use App\Models\PendaftarSantriModel;

class Terdaftar extends BaseController
{
  public function index()
  {
    $data['view'] = 'terdaftar';
    $data['_session'] = $this->session;
    $data['_uri_datatable'] = base_url("terdaftar/datatable");
    $data['_scroll_datatable'] = "350px";
    return view($data['view'], $data);
  }
  public function datatable()
  {
    $method = $this->request->getMethod();
    if ($method == 'post') {
      $pendaftarSantriModel = new PendaftarSantriModel();
      $where = null;
      $like = null;
      $params = ['where' => $where, 'like' => $like];
      return $this->datatable_data($pendaftarSantriModel, $params);
    } else {
      return redirect()->back();
    }
  }
  protected function datatable_data($model, $params = [])
  {
    $search = $_POST['search']['value'];
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $orderBy = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $ordered = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $model->count_all_not_detail($params, $search); // Panggil fungsi count_all_not_detail pada Admin
    $sql_data = $model->filter_not_detail($limit, $start, $orderBy, $ordered, $params, $search); // Panggil fungsi filter pada Admin
    $sql_filter = $model->count_all_not_detail($params, $search); // Panggil fungsi count_filter pada Admin
    $callback = [
      'draw' => $_POST['draw'], // Ini dari datatablenya
      'recordsTotal' => $sql_total,
      'recordsFiltered' => $sql_filter,
      'data' => $sql_data
    ];
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }

  //--------------------------------------------------------------------

}
