<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route untuk API
$route['api/absen'] = 'api/Absen';
$route['api/jadwal'] = 'api/Jadwal';
$route['api/dosen'] = 'api/Dosen';
$route['api/kelas'] = 'api/Kelas';
$route['api/mahasiswa'] = 'api/Mahasiswa';
$route['api/matkul'] = 'api/Matkul';
$route['api/qr'] = 'api/Qr';