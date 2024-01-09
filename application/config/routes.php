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
$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'homepage/index';
$route['product-list'] = 'homepage/productlisting';
$route['product-list/(:any)'] = 'homepage/productlisting/$1';
$route['product-list/(:any)/(:any)'] = 'homepage/productlisting/$1/$2';
$route['product-list/(:any)/(:any)/(:any)'] = 'homepage/productlisting/$1/$2/$3';
$route['product-list/(:any)/(:any)/(:any)/(:any)'] = 'homepage/productlisting/$1/$2/$3/$4';
$route['brands'] = 'homepage/brands';
$route['brand/(:any)'] = 'homepage/brands/$1';
$route['brand/(:any)/(:any)'] = 'homepage/brands/$1/$2';
$route['brand/(:any)/(:any)/(:any)'] = 'homepage/brands/$1/$2/$3';
$route['brand/(:any)/(:any)/(:any)/(:any)'] = 'homepage/brands/$1/$2/$3/$4';
$route['brand/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'homepage/brands/$1/$2/$3/$4/$5';
$route['seacrhlist']='homepage/seacrhlist';
$route['searchresult']='homepage/searchresult';
$route['browsebyprice']='homepage/browsebyprice';
$route['brandcigars']='homepage/ajaxloadmoreproducts';
$route['allcigars']='homepage/ajaxloadmoreproducts2';
$route['product']='homepage/product_detail';
$route['product/(:any)']='homepage/product_detail/$1';
$route['cart'] = 'homepage/cartlisting';
$route['updatecart'] = 'homepage/updateCartItem';
$route['addtocart'] = 'homepage/addtoCart';
$route['remove/(:any)'] = 'homepage/remove/$1';
$route['trim_special_char/(:any)'] = 'homepage/trim_special_char/$1';
$route['checkout'] = 'homepage/checkout';
$route['guest-checkout'] = 'homepage/checkout1';
$route['checked-out'] = 'homepage/checkoutProcess';
$route['about-us'] = 'homepage/aboutus';
$route['myaccount'] = 'homepage/myaccount';
$route['blogs'] = 'homepage/blogs';
$route['blog/(:any)'] = 'homepage/blogdetail/$1';
$route['brands'] = 'homepage/allbrand';
$route['best-seller'] = 'homepage/bestseller';
$route['news-letter'] = 'homepage/newsletter';
$route['faqs'] = 'homepage/faqs';
$route['policy/(:any)'] = 'homepage/policy/$1';
$route['contact-us'] = 'homepage/contact';
$route['send-message'] = 'homepage/send_message';
$route['userlogin'] = 'homepage/loginuser';
$route['register'] = 'homepage/registerationuser';
$route['save-user'] = 'homepage/saveuser';
$route['login'] = 'homepage/checkoutinfo';
$route['cigars'] = 'homepage/cigars';
$route['validate'] = 'homepage/validate';
$route['logout'] = 'homepage/logout';
$route['destroy-cart'] = 'homepage/destroy_cart';
$route['profile'] = 'homepage/userprofile';
$route['changepassword'] = 'homepage/changepassword';
$route['update-records'] = 'homepage/update_records';
$route['order/(:any)'] = 'homepage/orderview/$1';
$route['sitemap'] = 'homepage/site_map';