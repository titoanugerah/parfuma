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



#Others
$route['template'] = 'general/template';
$route['404_override'] = 'Errors';
$route['translate_uri_dashes'] = FALSE;
