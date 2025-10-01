<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');

// Auth
$routes->get('login', 'Auth::login');
$routes->post('login/doLogin', 'Auth::doLogin');
$routes->get('auth/logout', 'Auth::logout');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Courses
$routes->get('courses', 'Courses::index');
$routes->get('courses/enroll/(:num)', 'Courses::enroll/$1');
$routes->get('courses/create', 'Courses::create');
$routes->post('courses/store', 'Courses::store');
$routes->get('courses/delete/(:num)', 'Courses::delete/$1');

// Students (Admin only)
// Students CRUD
$routes->get('/students', 'Students::index');              // daftar students
$routes->get('/students/create', 'Students::create');      // form tambah
$routes->post('/students/store', 'Students::store');       // simpan baru
$routes->get('/students/edit/(:num)', 'Students::edit/$1');// form edit
$routes->post('/students/update/(:num)', 'Students::update/$1'); // update
$routes->get('/students/delete/(:num)', 'Students::delete/$1');  // hapus

$routes->get('/courses/enroll/(:num)', 'Courses::enroll/$1');   // untuk join ke course
$routes->get('/my-courses', 'Courses::myCourses');             // untuk lihat daftar kelas
$routes->get('courses/create', 'Courses::create');
$routes->post('courses/store', 'Courses::store');

$routes->get('logout', 'Auth::logout');
