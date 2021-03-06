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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'p';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['administrator/story/add'] = 'administrator/story_add';
$route['administrator/story/edit/(:num)'] = 'administrator/story_edit/$1';
$route['administrator/product/add'] = 'administrator/product_add';
$route['administrator/product/(:num)/photos'] = 'administrator/product_photos/$1';
$route['administrator/product/edit/(:num)'] = 'administrator/product_edit/$1';
$route['administrator/banner/add'] = 'administrator/banner_add';
$route['administrator/banner/edit/(:num)'] = 'administrator/banner_edit/$1';

$route['p/products/detail/(:num)/(:any)'] = 'p/product_detail/$1';
$route['p/stories/detail/(:num)/(:any)'] = 'p/story/$1';