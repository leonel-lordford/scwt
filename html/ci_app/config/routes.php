<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// frontend routes
$route['default_controller'] = 'scwt';
$route['transport'] = 'scwt/transport';
$route['accommodation'] = 'scwt/accommodation';
$route['tours'] = 'scwt/tours';
$route['send_message'] = 'scwt/send_message';
$route['verify_message/(:any)'] = 'scwt/verify_message/$1';

// backend routes
$route['admin'] = 'admin';
$route['admin/manage'] = 'admin/manage';
$route['admin/list'] = 'admin/manage';
$route['admin/list/text'] = 'admin/listing/text';
$route['admin/list/images'] = 'admin/listing/images';
// stories
$route['admin/list/stories'] = 'admin/listing/stories';
$route['admin/add/s'] = 'admin/add_story';
$route['admin/edit/s/(:num)'] = 'admin/edit_story/$1';
$route['admin/del/s'] = 'admin/remove_story';
// comments
$route['admin/list/friends'] = 'admin/listing/friends';
$route['admin/add/c'] = 'admin/add_comment';
$route['admin/edit/c/(:num)'] = 'admin/edit_comment/$1';
$route['admin/del/c'] = 'admin/remove_comment';

$route['admin/logout'] = 'admin/logout';
