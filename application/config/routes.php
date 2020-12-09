<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// link == controller/function
$route['default_controller'] = 'home';
$route['logout'] = 'user/logout';

#Dashboard
$route['dashboard'] = 'dashboard';

#Profile
$route['profile'] = 'profile';

#ROLE
$route['role'] = 'role';
$route['api/role/read'] = 'role/read';
$route['api/role/readDetail'] = 'role/readDetail';
$route['api/role/recover'] = 'role/recover';
$route['api/role/create'] = 'role/create';
$route['api/role/delete'] = 'role/delete';
$route['api/role/update'] = 'role/update';

#User
$route['user'] = 'user';
$route['api/user/read'] = 'user/read';
$route['api/user/readDetail'] = 'user/readDetail';
$route['api/user/recover'] = 'user/recover';
$route['api/user/create'] = 'user/create';
$route['api/user/delete'] = 'user/delete';
$route['api/user/update'] = 'user/update';

#Product
$route['product'] = 'product';
$route['api/product/read'] = 'product/read';
$route['api/product/readDetail'] = 'product/readDetail';
$route['api/product/recover'] = 'product/recover';
$route['api/product/create'] = 'product/create';
$route['api/product/delete'] = 'product/delete';
$route['api/product/update'] = 'product/update';
$route['api/product/upload/(:any)'] = 'product/upload/$1';

#Others
$route['template'] = 'general/template';
$route['404_override'] = 'Errors';
$route['translate_uri_dashes'] = FALSE;
