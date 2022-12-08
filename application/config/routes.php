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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

##route for items
$route['itemCRUD/(:num)'] = "itemCRUD/index";
$route['itemCRUD/show/(:num)'] = "itemCRUD/show/$1";
$route['itemCRUDCreate']['post'] = "itemCRUD/store";
$route['itemCRUDEdit/(:any)'] = "itemCRUD/edit/$1";
$route['itemCRUDUpdate/(:any)']['put'] = "itemCRUD/update/$1";
$route['itemCRUDDelete/(:any)']['delete'] = "itemCRUD/delete/$1";

##route for authors
$route['authors/(:num)'] = 'authors';
$route['authors/show/(:num)'] = "authors/show/$1";

##route for category
$route['category/(:num)'] 	   = "category/index";
$route['category/store'] 	   = "category/store";
$route['category/show/(:num)'] = "category/show/$1";
$route['category/edit/(:any)'] = "category/edit/$1";
$route['category/(:any)']['delete'] = "category/delete/$1";
$route['category/(:any)']['put'] = "category/update/$1";

##route for the product
$route['product/(:num)'] = "product/index";
$route['product/store']	 = "product/store";
$route['product/(:any)']['put'] = "product/update/$1";
$route['product/(:any)']['delete'] = "product/delete/$1";

##route for registration 
$route['register/'] = "register/index";
$route['register/userRegister'] = "register/userRegister";
$route['login/'] = "login/index";
$route['login/userLogin'] = "login/userLogin";

