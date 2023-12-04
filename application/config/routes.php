<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'user';
$route['login.js'] = 'user';
$route['data-user.js'] = 'user/datauser';
$route['dashboard.js'] = 'dashboard';
$route['logout.js'] = 'user/logout';
$route['kategori-barang.js'] = 'kategori';
$route['barang.js'] = 'barang';
$route['transaksi.js'] = 'Transaksi';
$route['laporan.js'] = 'Laporan';
$route['print-pdf.js'] = 'Laporan/cetak_pdf';
$route['download-excel.js'] = 'Laporan/cetak_excel';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
