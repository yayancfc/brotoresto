<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['tes'] = 'tes';

$route['pelanggan/(:any)'] = 'pelanggan/$1';
$route['pelanggan'] = 'pelanggan';

$route['pantry/(:any)'] = 'pantry/$1';
$route['pantry'] = 'pantry';

$route['koki/(:any)'] = 'koki/$1';
$route['koki'] = 'koki';

$route['kasir/(:any)'] = 'kasir/$1';
$route['kasir'] = 'kasir';

$route['cs/(:any)'] = 'cs/$1';
$route['cs'] = 'cs';

$route['pelayan/(:any)'] = 'pelayan/$1';
$route['pelayan'] = 'pelayan';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
