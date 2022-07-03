<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'event';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/login'] = 'login';
$route['register'] = 'register';
$route['post-register']['post'] = 'register/new_user_registration';
$route['dashboard'] = 'dashboard';
$route['logout'] = 'login/logout';
$route['kegiatan'] = 'kegiatan';
$route['kegiatan/create'] = 'kegiatan/create';
$route['kegiatan/store'] = 'kegiatan/store';
$route['kegiatan/edit/(:num)'] = 'kegiatan/show/$1';
$route['kegiatan/update/(:num)'] = 'kegiatan/update/$1';
$route['kegiatan/hapus/(:num)'] = 'kegiatan/delete/$1';
$route['jenis-kegiatan'] = 'jenis_kegiatan/index';
$route['jenis-kegiatan/create'] = 'jenis_kegiatan/create';
$toute['jenis-kegiatan/store'] = 'jenis_kegiatan/store';
$route['jenis-kegiatan/edit/(:num)'] = 'jenis_kegiatan/show/$1';
$route['jenis-kegiatan/hapus/(:num)'] = 'jenis_kegiatan/delete/$1';
$route['Event/daftar/(:num)'] = 'Event/daftar/$1';
