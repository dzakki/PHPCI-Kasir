<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['store/del_cart/(:any)'] = 'store/del_cart/$1';

$route['users']['GET'] = 'user/get_all';
$route['drinks']['GET'] = 'drink/get_all';
$route['tables']['GET'] = 'table/get_all';

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
