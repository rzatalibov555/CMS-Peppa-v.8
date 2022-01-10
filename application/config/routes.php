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


			// User start
$route['default_controller'] = 'UserController';
$route['index'] = 'UserController/index';
$route['single'] = 'UserController/single';
$route['contact'] = 'UserController/contact';
			// User end

			
			// Admin start
$route['admin_login']		 = 'AdminController/index';
$route['admin_loginAct']	 = 'AdminController/loginAct';
$route['admin_logout']	 = 'AdminController/logout';
$route['admin_dashboard'] 	 = 'AdminController/dashboard';

$route['admin_delete_admin/(.*)']	 = 'AdminController/delete_admin/$1';

$route['admin_updateAdmin/(.*)']	 = 'AdminController/updateAdmin/$1';
$route['admin_updateAdminAct/(.*)']	 = 'AdminController/updateAdminAct/$1';

$route['admin_removeAdminIMg/(.*)']	 = 'AdminController/removeAdminIMg/$1';

$route['admin_change_password/(.*)']	 = 'AdminController/change_password/$1';
$route['admin_change_passwordAct/(.*)']	 = 'AdminController/change_passwordAct/$1';
$route['admin_change_password_reset/(.*)']	 = 'AdminController/change_password_reset/$1';
$route['admin_change_password_resetAct/(.*)']	 = 'AdminController/change_password_resetAct/$1';


$route['admin_creatAdmin'] 	    = 'AdminController/creatAdmin';
$route['admin_creatAdminAct'] 	= 'AdminController/creatAdminAct';





$route['admin_item_list']	        = 'ItemController/index';
$route['admin_create_item']	        = 'ItemController/createItem';
$route['admin_create_item_act']     = 'ItemController/createItemAct';
$route['admin_update_form/(.*)']    = 'ItemController/update_form/$1';
$route['admin_updateItemAct/(.*)']  = 'ItemController/updateItemAct/$1';
$route['admin_deleteItem/(.*)']     = 'ItemController/delete/$1';
$route['admin_is_active_set']  = 'ItemController/isActiveSet';
			// Admin end

