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

$route['index'] = 'welcome/index';
$route['login'] = 'welcome/loginadmin';
$route['validation'] = 'welcome/login_validation';
$route['logout'] = 'welcome/logout';
$route['dashboard'] = 'welcome/dashboard';
$route['settings'] = 'welcome/settings';
$route['homepagelisting'] = 'welcome/homepagelisting';
$route['homepage'] = 'welcome/homepage';
$route['savedata'] = 'welcome/savedata';
$route['savesettings'] = 'welcome/savesettings';
$route['editslider/(:any)'] = 'welcome/editslider/$1';
$route['updateslider'] = 'welcome/update';
$route['deleteslider/(:any)'] = 'welcome/deletelist/$1';
$route['products'] = 'welcome/products';
$route['addproducts'] = 'welcome/addproducts';
$route['saveproducts'] = 'welcome/saveproducts';
$route['deleteproduct/(:any)'] = 'welcome/deleteproduct/$1';
$route['editproduct/(:any)'] = 'welcome/editproduct/$1';
$route['updateproduct'] = 'welcome/updateproduct';
$route['brands'] = 'welcome/brands';
$route['editbrand/(:any)'] = 'welcome/editbrand/$1';
$route['updatebrand/(:any)'] = 'welcome/updatebrand/$1';
$route['addbrands'] = 'welcome/addbrands';
$route['deletebrand/(:any)'] = 'welcome/deletebrand/$1';
$route['savebrands'] = 'welcome/savebrands';
$route['packagetype'] = 'welcome/packagetype';
$route['addtype'] = 'welcome/addtype';
$route['savetype'] = 'welcome/savetype';
$route['edittype/(:any)'] = 'welcome/edittype/$1';
$route['updatetype/(:any)'] = 'welcome/update_type/$1';
$route['deletetype/(:any)'] = 'welcome/deletetype/$1';
$route['cancelled_orders'] = 'welcome/cancel';
$route['editcancelstatus/(:any)'] = 'welcome/editcancelstatus/$1';
$route['completed_orders'] = 'welcome/completed';
$route['editcompletedstatus/(:any)'] = 'welcome/editcompletedstatus/$1';
$route['pending_orders'] = 'welcome/orders';
$route['editpendingstatus/(:any)'] = 'welcome/editorderstatus/$1';
$route['update_status'] = 'welcome/updateorderstatus';
$route['deleteorder/(:any)'] = 'welcome/deleteorder/$1';
$route['blogs'] = 'welcome/blogs';
$route['addblogs'] = 'welcome/addblogs';
$route['saveblogs'] = 'welcome/saveblogs';
$route['editblog/(:any)'] = 'welcome/editblog/$1';
$route['updateblog/(:any)'] = 'welcome/updateblog/$1';
$route['deleteblog/(:any)'] = 'welcome/deleteblog/$1';
$route['slug_generator/(:any)/(:any)/(:any)'] = 'welcome/slug_generator/$1/$2/$3';
$route['remove-accent/(:any)'] = 'welcome/remove_accent/$1';
$route['postslug/(:any)'] = 'welcome/postslug/$1';
$route['profile'] = 'welcome/profile';
$route['updateprofile/(:any)'] = 'welcome/updateprofile/$1';
$route['policies'] = 'welcome/policies';
$route['addpolicy'] = 'welcome/add_policy';
$route['savepolicy'] = 'welcome/savepolicy';
$route['editpolicy/(:any)'] = 'welcome/editpolicy/$1';
$route['updatepolicy'] = 'welcome/updatepolicy';
$route['deletepolicy/(:any)'] = 'welcome/deletepolicy/$1';
$route['faqs'] = 'welcome/faqs';
$route['addfaqs'] = 'welcome/add_faqs';
$route['savefaqs'] = 'welcome/savefaqs';
$route['editfaqs/(:any)'] = 'welcome/edit_faqs/$1';
$route['updatefaqs'] = 'welcome/updatefaqs';
$route['deletefaqs/(:any)'] = 'welcome/deletefaqs/$1';
$route['contact'] = 'welcome/contact';
$route['view'] = 'welcome/view_message';
$route['deletemessage/(:any)'] = 'welcome/deletemessage/$1';
$route['seo'] = 'welcome/seo';
$route['addseo'] = 'welcome/addseo';
$route['saveseo'] = 'welcome/saveseo';
$route['editseo/(:any)'] = 'welcome/editseo/$1';
$route['updateseo'] = 'welcome/updateseo';
$route['ckblogupload'] = 'welcome/ckblogupload';
$route['ckfaqsupload'] = 'welcome/ckfaqsupload';
$route['ckpolicyupload'] = 'welcome/ckpolicyupload';

