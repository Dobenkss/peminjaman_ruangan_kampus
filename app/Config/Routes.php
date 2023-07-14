<?php

namespace Config;

use CodeIgniter\Router\RouteCollectionInterface;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::login');
$routes->get('/home', 'Home::index');

// auth
$routes->post('/auth/processLogin', 'AuthController::processLogin');

$routes->get('/register', 'AuthController::register');
$routes->post('/auth/processRegister', 'AuthController::processRegister');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/anggota/dashboard', 'AnggotaController::index');
$routes->get('/admin/dashboard', 'AdminController::index');

$routes->get('/logout', 'AdminController::logout');

// admin & anggota
$routes->get('/admin', 'AdminController::admin');
$routes->get('/admin/create', 'AdminController::create');
$routes->post('/admin/store', 'AdminController::store');
$routes->get('/admin/edit/(:num)', 'AdminController::edit/$1');
$routes->post('/admin/update/(:num)', 'AdminController::update/$1');
$routes->get('/admin/delete/(:num)', 'AdminController::delete/$1');

$routes->get('/anggota', 'AnggotaController::anggota');

// crud ruangan
$routes->get('/rooms', 'RoomController::index');
$routes->get('/rooms/create', 'RoomController::create');
$routes->post('/rooms/store', 'RoomController::store');
$routes->get('/rooms/edit/(:num)', 'RoomController::edit/$1');
$routes->post('/rooms/update/(:num)', 'RoomController::update/$1');
$routes->get('/rooms/delete/(:num)', 'RoomController::delete/$1');

// booking
$routes->get('booking', 'BookingController::index');
$routes->get('booking/list', 'BookingController::listRooms');
$routes->get('booking/register/(:num)', 'BookingController::RegistrationForm/$1');
$routes->post('booking/register/store', 'BookingController::register');
// $routes->get('booking/update-status/(:num)/approved', 'BookingController::updateStatus/$1/approved');
// $routes->get('booking/update-status/(:num)/rejected', 'BookingController::updateStatus/$1/rejected');
// $routes->get('/update-status/(:num)/(:segment)', 'BookingController::updateStatus/$1/$2', ['as' => 'updateStatus']);
// $routes->get('/booking/update-status/(:num)/(:alpha)', 'BookingController::updateStatus/$1/$2', ['as' => 'update-status']);

$routes->get('booking/update-status/(:num)/approved', 'BookingController::updateStatus/$1/approved');
$routes->get('booking/update-status/(:num)/rejected', 'BookingController::updateStatus/$1/rejected');



/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
