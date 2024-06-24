<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Define the route for the root URL to point to Pesanan::index
$routes->get('/Pesanan', 'Pesanan::index');

// Define other routes for the Pesanan controller
$routes->get('/TambahPesanan', 'Pesanan::TambahPesanan');
$routes->post('/Pelanggan/simpanPesanan', 'Pelanggan::simpanPesanan');
$routes->get('UbahPesanan/(:any)', 'Pesanan::UbahPesanan/$1');
$routes->get('/HapusPesanan/(:num)', 'Pesanan::HapusPesanan/$1');

$routes->group('tukangcukur', function ($routes) {
    $routes->group('booking', function ($routes) {
        $routes->group('tampil', function ($routes) {
            $routes->get('', 'BookingView::index');
            $routes->get('edit/(:num)', 'BookingView::edit/$1');
            $routes->get('tambah', 'BookingView::tambah');
        });
        $routes->get('hapus/(:num)', 'Booking::hapus/$1');
        $routes->post('edit/(:num)', 'Booking::edit/$1');
        $routes->post('tambah', 'Booking::tambah');
    });
    $routes->group('profil', function ($routes) {
        $routes->group('tampil', function ($routes) {
            $routes->get('', 'Users::index');
            $routes->get('edit', 'Users::index');
            $routes->get('tambah', 'Users::index');
        });
        $routes->get('edit', 'Users::index');
        $routes->get('tambah', 'Users::index');
        $routes->get('hapus', 'Users::index');
    });
});

// Optionally, you might want to define a route for Pesanan index explicitly (although it is not strictly necessary since the root URL already points there)
