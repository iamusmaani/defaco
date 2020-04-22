<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin login URL
$route['admin'] = 'administration/admin/login';
$route['administration/fee/(:num)'] = 'administration/fee/index';
$route['administration/paymethod/(:num)'] = 'administration/paymethod/index';

// generic URL
$route['i-am-interested'] = 'landing/show_interest';
$route['terms'] = 'landing/show_terms';
$route['privacy'] = 'landing/show_privacy';
$route['register'] = 'landing/show_register';
$route['login'] = 'landing/show_login';
$route['search'] = 'landing/show_search';
$route['provider_register'] = 'landing/show_provider_register';
$route['forgot_password'] = 'landing/show_forgot_password';
$route['faq'] = 'landing/show_faq';
$route['business'] = 'landing/show_business';


// merchant URL
$route['members'] = 'members/merchant/login';
$route['members/category/(:num)'] = 'members/category/index';
$route['members/tax/(:num)'] = 'members/tax/index';
$route['members/attribute/(:num)'] = 'members/attribute/index';
$route['members/service/(:num)'] = 'members/service/index';
$route['members/settings/'] = 'members/settings/index';

