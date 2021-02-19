<?php

namespace App\Controllers;

class Syarat extends BaseController
{
  public function index()
  {
    $data['view'] = 'syarat';
    $data['_session'] = $this->session;
    return view($data['view'], $data);
  }

  //--------------------------------------------------------------------

}
