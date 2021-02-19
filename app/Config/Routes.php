<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/syarat', 'Syarat::index');
$routes->group('terdaftar', function ($routes) {
	$routes->get('', 'Terdaftar::index');
	$routes->post('datatable', 'Terdaftar::datatable');
});
$routes->group('pengumuman', function ($routes) {
	$routes->get('', 'Pengumuman::index');
	$routes->post('datatable', 'Pengumuman::datatable');
});
$routes->group('', ['filter' => 'auth'], function ($routes) {
	$routes->get('', 'DashboardSantri::index');
	$routes->get('dashboard_santri', 'DashboardSantri::index');
	$routes->group('formulir', function ($routes) {
		$routes->get('', 'Formulir::index');
		$routes->post('', 'Formulir::index');
	});
	$routes->group('edit_formulir', function ($routes) {
		$routes->get('', 'Formulir::edit_form');
		$routes->post('', 'Formulir::edit_form');
	});
	$routes->group('ubah_password', function ($routes) {
		$routes->get('', 'UbahPassword::index');
		$routes->post('', 'UbahPassword::index');
	});
	$routes->group('tes', function ($routes) {
		$routes->get('', 'Tes::index');
		$routes->post('', 'Tes::index');
	});
	$routes->group('hasil_pengumuman', function ($routes) {
		$routes->get('', 'HasilPengumuman::index');
		$routes->get('cetak_formulir', 'HasilPengumuman::cetak_formulir');
	});
});
$routes->group('api', ['namespace' => '\App\Controllers\Api'], function ($routes) {
	$routes->group('auth', ['namespace' => '\App\Controllers\Api\Auth'], function ($routes) {
		$routes->post('login', 'Login::index');
		$routes->post('daftar', 'Daftar::index');
		$routes->get('logout', 'Logout::index');
	});
	$routes->group('address', ['filter' => 'auth', 'namespace' => '\App\Controllers\Api\Address'], function ($routes) {
		$routes->get('kabupaten', 'Kabupaten::index');
		$routes->get('kecamatan', 'Kecamatan::index');
	});
});
$routes->group('admin', ['filter' => 'auth_admin', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
	$routes->get('', 'Dashboard::index');
	$routes->get('dashboard', 'Dashboard::index');
	$routes->get('ubah_password', 'UbahPassword::index');
	$routes->post('ubah_password', 'UbahPassword::index');
	$routes->group('pendaftaran', ['filter' => 'auth_admin', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'Pendaftaran::index');
		$routes->post('', 'Pendaftaran::index');
		$routes->get('aktifkan/(:num)', 'Pendaftaran::aktifkan/$1');
		$routes->get('matikan/(:num)', 'Pendaftaran::matikan/$1');
		$routes->get('edit/(:num)', 'Pendaftaran::edit/$1');
		$routes->post('edit/(:num)', 'Pendaftaran::edit/$1');
		$routes->get('hapus/(:num)', 'Pendaftaran::hapus/$1');
		$routes->post('datatable', 'Pendaftaran::datatable');
	});
	$routes->group('kelas', ['filter' => 'auth_admin:1', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'Kelas::index');
		$routes->get('tambah', 'Kelas::tambah');
		$routes->post('tambah', 'Kelas::tambah');
		$routes->get('edit/(:num)', 'Kelas::edit/$1');
		$routes->post('edit/(:num)', 'Kelas::edit/$1');
		$routes->get('hapus/(:num)', 'Kelas::hapus/$1');
		$routes->post('datatable', 'Kelas::datatable');
	});
	$routes->group('program', ['filter' => 'auth_admin:1', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'Program::index');
		$routes->get('tambah', 'Program::tambah');
		$routes->post('tambah', 'Program::tambah');
		$routes->get('edit/(:num)', 'Program::edit/$1');
		$routes->post('edit/(:num)', 'Program::edit/$1');
		$routes->get('hapus/(:num)', 'Program::hapus/$1');
		$routes->post('datatable', 'Program::datatable');
	});
	$routes->group('pendaftar', ['filter' => 'auth_admin', 'namespace' => '\App\Controllers\Admin\Pendaftar'], function ($routes) {
		$routes->group('proses', function ($routes) {
			$routes->get('', 'Proses::index');
			$routes->get('terima/(:num)', 'Proses::terima/$1');
			$routes->get('tolak/(:num)', 'Proses::tolak/$1');
			$routes->post('datatable', 'Proses::datatable');
		});
		$routes->group('terima', function ($routes) {
			$routes->get('', 'Terima::index');
			$routes->get('batal/(:num)', 'Terima::batal/$1');
			$routes->post('datatable', 'Terima::datatable');
		});
		$routes->group('tolak', function ($routes) {
			$routes->get('', 'Tolak::index');
			$routes->get('batal/(:num)', 'Tolak::batal/$1');
			$routes->post('datatable', 'Tolak::datatable');
		});
		$routes->group('laporan', function ($routes) {
			$routes->get('', 'Laporan::index');
			$routes->get('cetak/(:num)', 'Laporan::cetak/$1');
			$routes->post('datatable', 'Laporan::datatable');
		});
	});
	$routes->group('soal', ['filter' => 'auth_admin:1', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
		$routes->get('', 'Soal::index');
		$routes->get('tambah', 'Soal::tambah');
		$routes->post('tambah', 'Soal::tambah');
		$routes->get('edit/(:num)', 'Soal::edit/$1');
		$routes->post('edit/(:num)', 'Soal::edit/$1');
		$routes->get('hapus/(:num)', 'Soal::hapus/$1');
		$routes->post('datatable', 'Soal::datatable');
	});
	$routes->group('pengguna', ['filter' => 'auth_admin:1', 'namespace' => '\App\Controllers\Admin\Pengguna'], function ($routes) {
		$routes->group('admin', function ($routes) {
			$routes->get('', 'Admin::index');
			$routes->get('tambah', 'Admin::tambah');
			$routes->post('tambah', 'Admin::tambah');
			$routes->get('edit/(:num)', 'Admin::edit/$1');
			$routes->post('edit/(:num)', 'Admin::edit/$1');
			$routes->get('hapus/(:num)', 'Admin::hapus/$1');
			$routes->post('datatable', 'Admin::datatable');
		});
		$routes->group('santri', function ($routes) {
			$routes->get('', 'Santri::index');
			$routes->get('edit/(:num)', 'Santri::edit/$1');
			$routes->post('edit/(:num)', 'Santri::edit/$1');
			$routes->get('hapus/(:num)', 'Santri::hapus/$1');
			$routes->post('datatable', 'Santri::datatable');
		});
	});
	// $routes->group('pendaftar', ['filter' => 'auth_admin', 'namespace' => '\App\Controllers\Admin'], function ($routes) {
	// 	$routes->get('', 'Pendaftar::index');
	// 	$routes->get('hapus/(:num)', 'Pendaftar::hapus/$1');
	// 	$routes->post('datatable', 'Pendaftar::datatable');
	// });
});
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
