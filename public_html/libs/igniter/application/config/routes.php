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
|	http://codeigniter.com/user_guide/general/routing.html
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

/*
|	How routes work:
|		'route/wanted'
|		'controller/method'
|
|		$route['route/wanted'] = 'controller/method'
|
|
|	Passing parameters to a method:
|		Pass 'form_name' to 'Form_Handler':
|			$route['forms/handle/form_name'] = 'Form_Handler/handle/$1'
|			$1 = form_name
|
|		Handle all forms with 1 controller:
|			$route['forms/handle/(:any)'] = 'Form_Handler/handle/$1';
|			In handle($formName) = check form submitted
|
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

switch ( $_SERVER['HTTP_HOST'] ) {
	case 'admin.dopeoplestillplay.com':
		$route['default_controller'] = 'admin/AdminHome';
		
		// AdminHome routes
		$route['login'] = 'AdminHome/login';
		$route['home'] = 'admin/AdminHome/home';
		$route['logout'] = 'AdminHome/logout';
		
		// AdminTools tool routes
		$route['tools/data/([a-z]+)'] = 'AdminTools/dataTools/$1';
		$route['tools/database/([a-z]+)'] = 'AdminTools/databaseManagement/$1';
		$route['tools/logs/([a-z]+)'] = 'AdminTools/manageLogs/$1';
		
		// AdminTools function routes
		$route['tools/datatools/([a-z]+)'] = 'AdminTools/dataScrapeTool/$1';
		
		$route['(:any)'] = 'AdminHome/index';
		break;
	case 'm.dopeoplestillplay.com':
		$route['default_controller'] = "MobileHome";
		break;
	case 'forums.dopeoplestillplay.com':
		$route['default_controller'] = "ForumsHome";
		break;
	default:	
		$route['default_controller'] = 'Home';
		
		$route['forms/handle/(:any)'] = 'FormHandler/handle/$1';
		
		// Admin Redirects
		$route['admin'] = 'admin/AdminHome/redirect';
		$route['admin/(:any)'] = 'admin/AdminHome/redirect';
		
		// Forum Redirects
		$route['forums'] = 'ForumsHome/redirect';
		$route['forums/(:any)'] = 'ForumsHome/redirect';
		$route['forum'] = 'ForumsHome/redirect';
		$route['forum/(:any)'] = 'ForumsHome/redirect';
		
		// Mobile Redirects
		$route['mobile'] = 'MobileHome/redirect';
		$route['mobile/(:any)'] = 'MobileHome/redirect';
		
		$route['(:any)'] = 'Home';
	break;
}