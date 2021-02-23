<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PendaftarSantriModel;

class Home extends BaseController
{
	public function index()
	{
		helper('my');
		$pendaftaranModel = new PendaftaranModel();
		$pendaftarSantriModel = new PendaftarSantriModel();
		$pendaftaran = $pendaftaranModel->where(['pendaftaran_status' => 1])->first();
		$todays_date = date('Y-m-d H:i:s');
		$start_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_mulai'] ?? date('Y-m-d H:i:s')));
		$end_date = date('Y-m-d H:i:s', strtotime($pendaftaran['pendaftaran_tgl_selesai'] ?? date('Y-m-d H:i:s')));
		$kuota = $pendaftaran['pendaftaran_kuota'] ?? 0;
		$total_pendaftar = 0;
		if ($pendaftaran) {
			$total_pendaftar = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id']]);
		}
		$data['kuota'] = (int) $kuota - (int) $total_pendaftar;
		$data['_pendaftaran'] = $pendaftaran;
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['todays_date'] = $todays_date;
		if ($pendaftaran) {
			$data['jml'] = $total_pendaftar;
			$data['jmlcowo'] = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id'], 'pendaftar_santri_jk' => 'Laki - Laki']);
			$data['jmlcewe'] = $pendaftarSantriModel->count_where(['pendaftaran_id' => $pendaftaran['pendaftaran_id'], 'pendaftar_santri_jk' => 'Perempuan']);
		}
		$data['view'] = 'dashboard';
		$data['_session'] = $this->session;
		if ($this->session->isLogin != null && $this->session->role_id != 3) {
			return redirect()->to(base_url('admin'));
		}
		if ($this->session->isLogin != null && $this->session->role_id == 3) {
			return redirect()->to(base_url('dashboard_santri'));
		}
		return view($data['view'], $data);
	}

	//--------------------------------------------------------------------

}
