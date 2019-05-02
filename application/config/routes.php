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

/***********************************
 *
 * RU:
 *
 * http://example.com/[controller-class]/[controller-method]/[arguments]
 *
 * example.com/class/function/id/
 *
 CodeIgniter читает правила маршрутизации сверху вниз и маршрутизирует запрос по первому совпадению правил.
 Каждое правило - регулярное выражение отображенное в контроллере и методе разбитое слэшами.
 Когда приходит запрос, CodeIgniter ищет первое совпадение, и вызывает соответствующий контроллер и метод,
 возможно с аргументами.

 Маршруты будут выполняться в том порядке, в каком они определены.
 Высшие маршруты будет всегда иметь приоритет над низшими.

 Больше информации Вы найдете в документации URI Маршрутизации:
 http://codeigniter3.info/guide/general/routing

 Здесь, второе правило в массиве соответствует any запросу использующему шаблон строки (:any).
 и передает параметр методу view() класса pages.
 Теперь перейдите на index.php/about.
 *
 * ----URI Маршрутизация----
 * >> $route['product/:num'] = 'catalog/product_lookup';
 * значит
 * example.com/product/3/
 * будет
 * класс “catalog” и метод “product_lookup” сработает
 *
 * (:num) будет соответствовать сегменту, содержащему только числа. (:any) будет соответствовать сегменту,
 * содержащему любые символы (кроме ‘/’, который является разделителем сегмента).
 * Подстановки являются псевдонимами регулярных выражений,
 *  :any расшифровуется как [^/]+ и :num - как [0-9]+, соответственно.
 *
 * >> $route['product/(:num)'] = 'catalog/product_lookup_by_id/$1';
 * URL с первым сегментом “product” и числом во втором будет перенаправлять на класс “catalog” и метод “product_lookup_by_id”
 * проходя соответствие от переменной к методу.
 *
 * >> $route['products/([a-z]+)/(\d+)'] = '$1/id_$2';
 * В примере выше, URI похожие на products/shirts/123 будут вызывать контроллер “shirts” и метод “id_123”.
 *
 * >> $route['login/(.+)'] = 'auth/login/$1';
 * Например, если пользователь обращается к защищенной паролем странице
 * и вы хотите перенаправить его обратно на ту же страницу после входа.
 *
 * + Обратные вызовы (Коллбэки):
 * http://codeigniter3.info/guide/general/routing#callbacks
 *
 * + Использование HTTP команд в маршрутах :
 * http://codeigniter3.info/guide/general/routing#using-http-verbs-in-routes
 *
 */

$route['default_controller'] = 'main';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['news'] = 'news';
$route['news/create'] = 'news/create';
$route['news/edit'] = 'news/edit';
$route['news/delete'] = 'news/delete';
$route['news/(:any)'] = 'news/view/$1';

$route['(:any)'] = 'pages/view/$1';