<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['store/del_cart/(:any)'] = 'store/del_cart/$1';

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
