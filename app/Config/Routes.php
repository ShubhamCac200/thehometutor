<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/admin', 'Admin::index');
$routes->get('/user', 'User::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->get('forgot-password', 'PasswordReset::forgotPassword');
$routes->post('forgot-password', 'PasswordReset::sendOtp');

$routes->get('verify-otp', 'PasswordReset::verifyOtpForm');
$routes->post('verify-otp', 'PasswordReset::verifyOtp');

$routes->get('reset-password', 'PasswordReset::resetPasswordForm');
$routes->post('reset-password', 'PasswordReset::resetPassword');



