<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
// PEMBINAAN 
$routes->get('/akun/pembinaan/index', 'Akun::index');
$routes->get('/akun/pembinaan/new', 'Akun::new');
$routes->post('/akun/pembinaan/index', 'Akun::create'); //MENGIRIMKAN DATA NEW 

$routes->get('/akun/pembinaan/edit/(:num)', 'Akun::edit/$1');
$routes->post('/akun/pembinaan/edit/(:num)', 'Akun::update/$1');
$routes->PUT('/akun/pembinaan/edit/(:num)', 'Akun::update/$1');

$routes->post('/akun/pembinaan/index/(:num)', 'Akun::delete/$1');
$routes->delete('/akun/pembinaan/index/(:num)', 'Akun::delete/$1');

//PENCAIRAN PEMBINAAN
$routes->get('/pencairan/pembinaan/index', 'PencairanPembinaan::index');
$routes->get('/pencairan/pembinaan/new', 'PencairanPembinaan::new');
$routes->get('/pencairan/pembinaan/prints', 'PencairanPembinaan::prints');
$routes->get('/pencairan/pembinaan/detail/(:num)', 'PencairanPembinaan::detail/$1');
$routes->post('/pencairan/pembinaan/index', 'PencairanPembinaan::create'); //MENGIRIMKAN DATA NEW 

$routes->get('/pencairan/pembinaan/edit/(:num)', 'PencairanPembinaan::edit/$1');
$routes->post('/pencairan/pembinaan/edit/(:num)', 'PencairanPembinaan::update/$1');
$routes->PUT('/pencairan/pembinaan/edit/(:num)', 'PencairanPembinaan::update/$1');

$routes->post('/pencairan/pembinaan/index/(:num)', 'PencairanPembinaan::delete/$1');
$routes->delete('/pencairan/pembinaan/index/(:num)', 'PencairanPembinaan::delete/$1');
//URL BARIS BARU PEMBINAAN
$routes->get('/PencairanPembinaan/akun', 'PencairanPembinaan::akun');
$routes->get('/PencairanPembinaan/item', 'PencairanPembinaan::item');




//ROUTE AKUN MASTER PROGRAM 
$routes->get('/master/program/index', 'AkunProgram::index'); //MENAMPILKAN HALAMAN AKUN PROGRAM
$routes->get('/master/program/new', 'AkunProgram::new'); //MENAMPILKAN HALAMAN NEW PROGRAM
$routes->post('/master/program/index', 'AkunProgram::store'); //MENGIRIMKAN DATA NEW PROGRAM
//EDIT DATA AKUN PROGRAM
$routes->get('/master/program/edit/(:num)', 'AkunProgram::edit/$1');
$routes->post('/master/program/edit/(:num)', 'AkunProgram::update/$1');
$routes->PUT('/master/program/edit/(:num)', 'AkunProgram::update/$1');
//HAPUS DATA PROGRAM
$routes->post('/master/program/index/(:num)', 'AkunProgram::destroy/$1');
$routes->delete('/master/program/index/(:num)', 'AkunProgram::destroy/$1');


//ROUTE AKUN MASTER KEGIATAN 
$routes->get('/master/kegiatan/index', 'AkunKegiatan::index'); //MENAMPILKAN HALAMAN AKUN KEGIATAN
$routes->get('/master/kegiatan/new', 'AkunKegiatan::new'); //MENAMPILKAN HALAMAN NEW KEGIATAN
$routes->post('/master/kegiatan/index', 'AkunKegiatan::create'); //MENGIRIMKAN DATA NEW KEGIATAN
//EDIT DATA AKUN KEGIATAN
$routes->get('/master/kegiatan/(:num)/edit', 'AkunKegiatan::edit/$1');
$routes->post('/master/kegiatan/edit/(:num)', 'AkunKegiatan::update/$1');
$routes->PUT('/master/kegiatan/edit/(:num)', 'AkunKegiatan::update/$1');
//DELETE DATA AKUN KEGIATAN 
$routes->post('/master/kegiatan/index/(:num)', 'AkunKegiatan::delete/$1');
$routes->delete('/master/kegiatan/index/(:num)', 'AkunKegiatan::delete/$1');


//ROUTE AKUN MASTER OUTPUT
$routes->get('/master/output/index', 'AkunOutput::index'); //MENAMPILKAN HALAMAN AKUN OUTPUT
$routes->get('/master/output/new', 'AkunOutput::new'); //MENAMPILKAN HALAMAN NEW OUTPUT
$routes->post('/master/output/index', 'AkunOutput::create'); //MENGIRIMKAN DATA NEW OUTPUT
//EDIT DATA AKUN OUTPUT
$routes->get('/master/output/(:num)/edit', 'AkunOutput::edit/$1');
$routes->post('/master/output/edit/(:num)', 'AkunOutput::update/$1');
$routes->PUT('/master/output/edit/(:num)', 'AkunOutput::update/$1');
//DELETE DATA AKUN OUTPUT 
$routes->post('/master/output/index/(:num)', 'AkunOutput::delete/$1');
$routes->delete('/master/output/index/(:num)', 'AkunOutput::delete/$1');


//ROUTE AKUN MASTER SUB OUTPUT
$routes->get('/master/suboutput/index', 'AkunSubOutput::index'); //MENAMPILKAN HALAMAN AKUN SUB OUTPUT
$routes->get('/master/suboutput/new', 'AkunSubOutput::new'); //MENAMPILKAN HALAMAN NEW SUB OUTPUT
$routes->post('/master/suboutput/index', 'AkunSubOutput::create'); //MENGIRIMKAN DATA NEW SUB OUTPUT
//EDIT DATA AKUN SUB OUTPUT
$routes->get('/master/suboutput/(:num)/edit', 'AkunSubOutput::edit/$1');
$routes->post('/master/suboutput/edit/(:num)', 'AkunSubOutput::update/$1');
$routes->PUT('/master/suboutput/edit/(:num)', 'AkunSubOutput::update/$1');
//DELETE DATA AKUN SUB OUTPUT 
$routes->post('/master/suboutput/index/(:num)', 'AkunSubOutput::delete/$1');
$routes->delete('/master/suboutput/index/(:num)', 'AkunSubOutput::delete/$1');


//ROUTE AKUN MASTER KOMPONEN
$routes->get('/master/komponen/index', 'AkunKomponen::index'); //MENAMPILKAN HALAMAN AKUN KOMPONEN
$routes->get('/master/komponen/new', 'AkunKomponen::new'); //MENAMPILKAN HALAMAN NEW KOMPONEN
$routes->post('/master/komponen/index', 'AkunKomponen::create'); //MENGIRIMKAN DATA NEW KOMPONEN
//EDIT DATA AKUN KOMPONEN
$routes->get('/master/komponen/(:num)/edit', 'AkunKomponen::edit/$1');
$routes->post('/master/komponen/edit/(:num)', 'AkunKomponen::update/$1');
$routes->PUT('/master/komponen/edit/(:num)', 'AkunKomponen::update/$1');
//DELETE DATA AKUN KOMPONEN 
$routes->post('/master/komponen/index/(:num)', 'AkunKomponen::delete/$1');
$routes->delete('/master/komponen/index/(:num)', 'AkunKomponen::delete/$1');


//ROUTE AKUN MASTER SUB KOMPONEN
$routes->get('/master/subkomponen/index', 'AkunSubKomponen::index'); //MENAMPILKAN HALAMAN AKUN SUB KOMPONEN
$routes->get('/master/subkomponen/new', 'AkunSubKomponen::new'); //MENAMPILKAN HALAMAN NEW SUB KOMPONEN
$routes->post('/master/subkomponen/index', 'AkunSubKomponen::create'); //MENGIRIMKAN DATA NEW SUB KOMPONEN
//EDIT DATA AKUN SUB KOMPONEN
$routes->get('/master/subkomponen/(:num)/edit', 'AkunSubKomponen::edit/$1');
$routes->post('/master/subkomponen/edit/(:num)', 'AkunSubKomponen::update/$1');
$routes->PUT('/master/subkomponen/edit/(:num)', 'AkunSubKomponen::update/$1');
//DELETE DATA AKUN SUB KOMPONEN 
$routes->post('/master/subkomponen/index/(:num)', 'AkunSubKomponen::delete/$1');
$routes->delete('/master/subkomponen/index/(:num)', 'AkunSubKomponen::delete/$1');


//ROUTE AKUN MASTER AKUN
$routes->get('/master/akun/index', 'AkunAkun::index'); //MENAMPILKAN HALAMAN AKUN AKUN
$routes->get('/master/akun/new', 'AkunAkun::new'); //MENAMPILKAN HALAMAN NEW AKUN
$routes->post('/master/akun/index', 'AkunAkun::create'); //MENGIRIMKAN DATA NEW AKUN
//EDIT DATA AKUN AKUN
$routes->get('/master/akun/(:num)/edit', 'AkunAkun::edit/$1');
$routes->post('/master/akun/edit/(:num)', 'AkunAkun::update/$1');
$routes->PUT('/master/akun/edit/(:num)', 'AkunAkun::update/$1');
//DELETE DATA AKUN AKUN 
$routes->post('/master/akun/index/(:num)', 'AkunAkun::delete/$1');
$routes->delete('/master/akun/index/(:num)', 'AkunAkun::delete/$1');


//ROUTE AKUN MASTER ITEM
$routes->get('/master/item/index', 'AkunItem::index'); //MENAMPILKAN HALAMAN AKUN ITEM
$routes->get('/master/item/new', 'AkunItem::new'); //MENAMPILKAN HALAMAN NEW ITEM 
$routes->post('/master/item/index', 'AkunItem::create'); //MENGIRIMKAN DATA NEW ITEM 
//EDIT DATA AKUN ITEM
$routes->get('/master/item/(:num)/edit', 'AkunItem::edit/$1');
$routes->post('/master/item/edit/(:num)', 'AkunItem::update/$1');
$routes->PUT('/master/item/edit/(:num)', 'AkunItem::update/$1');
//DELETE DATA AKUN ITEM 
$routes->post('/master/item/index/(:num)', 'AkunItem::delete/$1');
$routes->delete('/master/item/index/(:num)', 'AkunItem::delete/$1');


//ROUTE AKUN MASTER AKUN
$routes->get('/master/pagu/index', 'PaguAnggaran::index'); //MENAMPILKAN HALAMAN AKUN AKUN
$routes->get('/master/pagu/new', 'PaguAnggaran::new'); //MENAMPILKAN HALAMAN NEW AKUN
$routes->post('/master/pagu/index', 'PaguAnggaran::create'); //MENGIRIMKAN DATA NEW AKUN
//EDIT DATA AKUN AKUN
$routes->get('/master/pagu/(:num)/edit', 'PaguAnggaran::edit/$1');
$routes->post('/master/pagu/edit/(:num)', 'PaguAnggaran::update/$1');
$routes->PUT('/master/pagu/edit/(:num)', 'PaguAnggaran::update/$1');
//DELETE DATA AKUN AKUN 
$routes->post('/master/pagu/index/(:num)', 'PaguAnggaran::delete/$1');
$routes->delete('/master/pagu/index/(:num)', 'PaguAnggaran::delete/$1');


//ROUTE AKUN MASTER AKUN
$routes->get('/transaksi/realisasi/index', 'Realisasi::index'); //MENAMPILKAN HALAMAN AKUN AKUN
$routes->get('/transaksi/realisasi/new', 'Realisasi::new'); //MENAMPILKAN HALAMAN NEW AKUN
$routes->post('/transaksi/realisasi/index', 'Realisasi::create'); //MENGIRIMKAN DATA NEW AKUN
//EDIT DATA AKUN AKUN
$routes->get('/transaksi/realisasi/(:num)/edit', 'Realisasi::edit/$1');
$routes->post('/transaksi/realisasi/edit/(:num)', 'Realisasi::update/$1');
$routes->PUT('/transaksi/realisasi/edit/(:num)', 'Realisasi::update/$1');
//DELETE DATA AKUN AKUN 
$routes->post('/transaksi/realisasi/index/(:num)', 'Realisasi::delete/$1');
$routes->delete('/transaksi/realisasi/index/(:num)', 'Realisasi::delete/$1');


//ROUTE AKUN TRANSAKSI PEMBINAAN
$routes->get('/transaksi/pembinaan/index', 'TransaksiPembinaan::index'); //MENAMPILKAN HALAMAN 
$routes->get('/transaksi/pembinaan/new', 'TransaksiPembinaan::new'); //MENAMPILKAN HALAMAN NEW  
$routes->post('/transaksi/pembinaan/index', 'TransaksiPembinaan::create'); //MENGIRIMKAN DATA NEW  
//EDIT DATA 
$routes->get('/transaksi/pembinaan/(:num)/edit', 'TransaksiPembinaan::edit/$1');
$routes->post('/transaksi/pembinaan/edit/(:num)', 'TransaksiPembinaan::update/$1');
$routes->PUT('/transaksi/pembinaan/edit/(:num)', 'TransaksiPembinaan::update/$1');
//DELETE DATA  
$routes->post('/transaksi/pembinaan/index/(:num)', 'TransaksiPembinaan::delete/$1');
$routes->delete('/transaksi/pembinaan/index/(:num)', 'TransaksiPembinaan::delete/$1');

$routes->get('/TransaksiPembinaan/akun', 'TransaksiPembinaan::akun');
$routes->get('/TransaksiPembinaan/item', 'TransaksiPembinaan::item');

$routes->resource('akun');
$routes->resource('subkomponen');
$routes->resource('komponen');
$routes->resource('suboutput');
$routes->resource('output');
$routes->resource('kegiatan');

$routes->get('/SPP/pembinaan/pembinaan1', 'Pembinaan1::pembinaan1');
$routes->get('/SPP/pembinaan/new', 'Pembinaan1::new');
$routes->post('/SPP/pembinaan1', 'Pembinaan1::store');

$routes->get('/SPP/pembinaan/edit/(:num)', 'Pembinaan1::edit/$1');
$routes->post('/SPP/pembinaan/edit/(:num)', 'Pembinaan1::update/$1');
$routes->PUT('/SPP/pembinaan/edit/(:num)', 'Pembinaan1::update/$1');


$routes->post('/SPP/pembinaan/pembinaan1/(:num)', 'Pembinaan1::destroy/$1');
$routes->delete('/SPP/pembinaan/pembinaan1/(:num)', 'Pembinaan1::destroy/$1');


$routes->get('/dashboard', 'Dashboard::index');


$routes->get('/pencairan/pembinaan/index', 'PencairanPembinaan::index');

$routes->resource('kegiatan');
