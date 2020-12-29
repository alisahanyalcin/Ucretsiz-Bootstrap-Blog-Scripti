<?php defined('BASEPATH') OR exit('No direct script access allowed');

//admin giriş tarafı
$route['auth/login'] = "Auth/login";
$route['auth/logout'] = "Auth/logout";

//admin paneli tarafı
$route['panel'] = "Panel/home";
$route['panel/home'] = "Panel/home";
$route['panel/profil'] = "Panel/profil";
$route['panel/sistem_ayarlari'] = "Panel/sistem_ayarlari";
$route['panel/iletisim'] = "Panel/iletisim";
$route['panel/iletisim/(:num)'] = "Panel/iletisim/$1";
$route['panel/iletisim_sil/(:num)'] = "Panel/iletisim_sil/$1";

$route['panel/sayfalar'] = "Panel/sayfalar";
$route['panel/sayfalar/(:num)'] = "Panel/sayfalar/$1";
$route['panel/sayfa'] = "Panel/sayfa";
$route['panel/sayfa_duzenle/(:num)'] = "Panel/sayfa_duzenle/$1";
$route['panel/sayfa_ekle'] = "Panel/sayfa_ekle";
$route['panel/sayfa_sil/(:num)'] = "Panel/sayfa_sil/$1";

$route['panel/bloglar'] = "Panel/bloglar";
$route['panel/bloglar/(:num)'] = "Panel/bloglar/$1";
$route['panel/blog'] = "Panel/blog";
$route['panel/blog_duzenle/(:num)'] = "Panel/blog_duzenle/$1";
$route['panel/blog_kapat/(:num)'] = "Panel/blog_kapat/$1";
$route['panel/blog_ac/(:num)'] = "Panel/blog_ac/$1";
$route['panel/blog_ekle'] = "Panel/blog_ekle";
$route['panel/blog_sil/(:num)'] = "Panel/blog_sil/$1";

$route['panel/menuler'] = "Panel/menuler";
$route['panel/menu_ekle'] = "Panel/menu_ekle";
$route['panel/menuler/(:num)'] = "Panel/menuler/$1";
$route['panel/menu_sil/(:num)'] = "Panel/menu_sil/$1";
$route['panel/menu_duzenle/(:num)'] = "Panel/menu_duzenle/$1";

$route['panel/kategoriler'] = "Panel/kategoriler";
$route['panel/kategori_ekle'] = "Panel/kategori_ekle";
$route['panel/kategoriler/(:num)'] = "Panel/kategoriler/$1";
$route['panel/kategori_sil/(:num)'] = "Panel/kategori_sil/$1";
$route['panel/kategori_duzenle/(:num)'] = "Panel/kategori_duzenle/$1";

$route['panel/yorumlar'] = "Panel/yorumlar";
$route['panel/yorumlar/(:num)'] = "Panel/yorumlar/$1";
$route['panel/yorum_sil/(:num)'] = "Panel/yorum_sil/$1";
$route['panel/yorum_onayla/(:num)'] = "Panel/yorum_onayla/$1";
$route['panel/yorum_gizle/(:num)'] = "Panel/yorum_gizle/$1";

$route['panel/image_upload'] = "Panel/image_upload";



//Kullanıcı Tarafı
$route['(:num)'] = "welcome/index/$1";
$route['iletisim'] = "welcome/iletisim";
$route['yorum_yap'] = "welcome/yorum_yap";
$route['sayfa/(.*)'] = "welcome/sayfa/$1";
$route['ara'] = "welcome/arama";
$route['ara/(:num)'] = "welcome/arama/$1";
$route['kategoriler'] = "welcome/kategoriler";
$route['kategori/(.*)'] = "welcome/kategori/$1";
$route['(.*)'] = "welcome/detay/$1";

//sistem tarafı değiştirmeyin.
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
