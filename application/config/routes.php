<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']                         = "home/index";
$route['404_override']                               = '';

$route['admin']                                      = "admin/home";
$route['gioi-thieu']                                 = "home/about";
$route['lien-he']                                    = "home/contact";
$route['danh-sach-san-pham-yeu-thich']               = "home/product/wishlists";
$route['so-sanh-san-pham']                           = "home/product/compare";
$route['gio-hang']                                   = "home/product/cart";
$route['san-pham-moi']                               = "home/product/index";
$route['san-pham-moi/(:num)']                        = "home/product/index/(:num)";
$route['san-pham-ban-chay']                          = "home/product/sell_product";
$route['san-pham-ban-chay/(:num)']                   = "home/product/sell_product/(:num)";
$route['san-pham-dac-biet']                          = "home/product/special_product";
$route['san-pham-dac-biet/(:num)']                   = "home/product/special_product/(:num)";
$route['san-pham-sap-ve']                            = "home/product/coming_product";
$route['xu-huong-thoi-trang']                        = "home/news";
$route['xu-huong-thoi-trang/(:num)']                 = "home/news/index/(:num)";
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)-n(:num)']  = "home/news/detail";
$route['mua-so-luong-lon']                           = "home/policy/purchase";
$route['ho-tro']                                     = "home/support";
$route['khuyen-mai']                                 = "home/news/promotion";
$route['khuyen-mai/(:num)']                          = "home/news/promotion/(:num)";
$route['([a-zA-Z0-9-_]+)-p(:num)']                   = "home/product/detail";
$route['search']                                     = "home/search/index";
$route['dang-nhap']                                  = "home/member/login";

/* End of file routes.php */
/* Location: ./application/config/routes.php */