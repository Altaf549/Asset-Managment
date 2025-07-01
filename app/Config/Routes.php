<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication routes
$routes->get('/login', 'Auth\Login::index');
$routes->post('/login/authenticate', 'Auth\Login::authenticate');
$routes->get('admin/logout', 'Auth\Login::logout');

// Admin routes

$routes->get('admin/dashboard', 'Admin\Dashboard::index');

// Employee routes
$routes->get('admin/employee', 'EmployeeController::index');
$routes->get('admin/employee/getAllEmployees', 'EmployeeController::getAllEmployees');
$routes->get('admin/employee/(:num)', 'EmployeeController::getEmployee/$1');
$routes->post('admin/employee/create', 'EmployeeController::createEmployee');
$routes->post('admin/employee/update/(:num)', 'EmployeeController::updateEmployee/$1');
$routes->post('admin/employee/toggle-status/(:num)', 'EmployeeController::toggleStatus/$1');
$routes->delete('admin/employee/delete/(:num)', 'EmployeeController::deleteEmployee/$1');
