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
$routes->group('dashboard', function ($routes) {
	$routes->get('', 'Admin\Kelas::index', ['as' => 'admin_index']);
	$routes->group('kelas', function ($routes) {
		$routes->get('', 'Admin\Kelas::index', ['as' => 'admin_data_kelas']);
		$routes->get('form/', 'Admin\Kelas::formAdd', ['as' => 'admin_form_add_data_kelas']);
		$routes->post('store', 'Admin\Kelas::store', ['as' => 'admin_add_data_kelas']);
		$routes->get('form/(:num)', 'Admin\Kelas::formUpdate/$1', ['as' => 'admin_form_update_data_kelas']);
		$routes->post('update', 'Admin\Kelas::update', ['as' => 'admin_update_data_kelas']);
		$routes->get('delete/(:num)', 'Admin\Kelas::delete/$1', ['as' => 'admin_delete_data_kelas']);
	});
	$routes->group('mahasiswa', function ($routes) {
		$routes->get('(:num)', 'Admin\Mahasiswa::index/$1', ['as' => 'admin_data_mahasiswa']);
		$routes->get('(:num)/form', 'Admin\Mahasiswa::formAdd/$1', ['as' => 'admin_form_add_data_mahasiswa']);
		$routes->post('store', 'Admin\Mahasiswa::store', ['as' => 'admin_add_data_mahasiswa']);
		$routes->get('form/(:num)/(:num)', 'Admin\Mahasiswa::formUpdate/$1/$2', ['as' => 'admin_form_update_data_mahasiswa']);
		$routes->post('update', 'Admin\Mahasiswa::update', ['as' => 'admin_update_data_mahasiswa']);
		$routes->get('delete/(:num)/(:num)', 'Admin\Mahasiswa::delete/$1/$2', ['as' => 'admin_delete_data_mahasiswa']);
	});
	$routes->group('kehadiran', function ($routes) {
		$routes->get('(:num)', 'Admin\Kehadiran::index/$1', ['as' => 'admin_data_kehadiran']);
		$routes->post('form', 'Admin\Kehadiran::formAdd', ['as' => 'admin_form_add_data_kehadiran']);
		$routes->post('store', 'Admin\Kehadiran::store', ['as' => 'admin_add_data_kehadiran']);
		$routes->get('form/(:num)/(:any)', 'Admin\Kehadiran::formUpdate/$1/$2', ['as' => 'admin_form_update_data_kehadiran']);
		$routes->post('update', 'Admin\Kehadiran::update', ['as' => 'admin_update_data_kehadiran']);
		$routes->get('delete/(:num)/(:any)', 'Admin\Kehadiran::delete/$1/$2', ['as' => 'admin_delete_data_kehadiran']);
		$routes->get('export/(:num)/(:any)', 'Admin\Export::download/$1/$2', ['as' => 'admin_export_data_kehadiran']);
	});
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
