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

// Laptop Product routes
$routes->get('admin/laptop/product', 'LaptopProductController::index');
$routes->get('admin/laptop/product/getAllLaptopProducts', 'LaptopProductController::getAllLaptopProducts');
$routes->get('admin/laptop/product/(:num)', 'LaptopProductController::getLaptopProduct/$1');
$routes->post('admin/laptop/product/createLaptopProduct', 'LaptopProductController::createLaptopProduct');
$routes->post('admin/laptop/product/updateLaptopProduct/(:num)', 'LaptopProductController::updateLaptopProduct/$1');
$routes->delete('admin/laptop/product/deleteLaptopProduct/(:num)', 'LaptopProductController::deleteLaptopProduct/$1');
$routes->post('admin/laptop/product/assignLaptop', 'LaptopProductController::assignLaptop');
$routes->get('admin/laptop/product/getAllUnassignLaptopProducts', 'LaptopProductController::getAllUnassignLaptopProducts');
$routes->get('admin/laptop/product/getAllAssignLaptopProducts', 'LaptopProductController::getAllAssignLaptopProducts');
$routes->post('admin/laptop/product/unassignLaptop', 'LaptopProductController::unassignLaptop');

// Assigned Laptops routes
$routes->get('admin/laptop/assigned', 'LaptopAssignedController::index');
$routes->get('admin/laptop/assigned/getAllAssignedLaptops', 'LaptopAssignedController::getAllAssignedLaptops');