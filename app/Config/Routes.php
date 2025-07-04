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

// Laptop routes
$routes->get('admin/laptop/product', 'Laptop\LaptopProductController::index');
$routes->get('admin/laptop/product/getAllLaptopProducts', 'Laptop\LaptopProductController::getAllLaptopProducts');
$routes->get('admin/laptop/product/(:num)', 'Laptop\LaptopProductController::getLaptopProduct/$1');
$routes->post('admin/laptop/product/createLaptopProduct', 'Laptop\LaptopProductController::createLaptopProduct');
$routes->post('admin/laptop/product/updateLaptopProduct/(:num)', 'Laptop\LaptopProductController::updateLaptopProduct/$1');
$routes->delete('admin/laptop/product/deleteLaptopProduct/(:num)', 'Laptop\LaptopProductController::deleteLaptopProduct/$1');
$routes->post('admin/laptop/product/assignLaptop', 'Laptop\LaptopProductController::assignLaptop');
$routes->get('admin/laptop/product/getAllUnassignLaptopProducts', 'Laptop\LaptopProductController::getAllUnassignLaptopProducts');
$routes->get('admin/laptop/product/getAllAssignLaptopProducts', 'Laptop\LaptopProductController::getAllAssignLaptopProducts');
$routes->post('admin/laptop/product/unassignLaptop', 'Laptop\LaptopProductController::unassignLaptop');
$routes->get('admin/laptop/assigned', 'Laptop\LaptopAssignedController::index');
$routes->get('admin/laptop/assigned/getAllAssignedLaptops', 'Laptop\LaptopAssignedController::getAllAssignedLaptops');
$routes->get('admin/laptop/unassigned', 'Laptop\LaptopUnassignedController::index');
$routes->get('admin/laptop/unassigned/getAllUnassignedLaptops', 'Laptop\LaptopUnassignedController::getAllUnassignedLaptops');

//Monitor routes
$routes->get('admin/monitor/product', 'Monitor\MonitorProductController::index');
$routes->get('admin/monitor/product/getAllMonitorProducts', 'Monitor\MonitorProductController::getAllMonitorProducts');
$routes->get('admin/monitor/product/(:num)', 'Monitor\MonitorProductController::getMonitorProduct/$1');
$routes->post('admin/monitor/product/createMonitorProduct', 'Monitor\MonitorProductController::createMonitorProduct');
$routes->post('admin/monitor/product/updateMonitorProduct/(:num)', 'Monitor\MonitorProductController::updateMonitorProduct/$1');
$routes->delete('admin/monitor/product/deleteMonitorProduct/(:num)', 'Monitor\MonitorProductController::deleteMonitorProduct/$1');
$routes->post('admin/monitor/product/assignMonitor', 'Monitor\MonitorProductController::assignMonitor');
$routes->get('admin/monitor/product/getAllUnassignMonitorProducts', 'Monitor\MonitorProductController::getAllUnassignMonitorProducts');
$routes->get('admin/monitor/product/getAllAssignMonitorProducts', 'Monitor\MonitorProductController::getAllAssignMonitorProducts');
$routes->post('admin/monitor/product/unassignMonitor', 'Monitor\MonitorProductController::unassignMonitor');
$routes->get('admin/monitor/assigned', 'Monitor\MonitorAssignedController::index');
$routes->get('admin/monitor/assigned/getAllAssignedMonitors', 'Monitor\MonitorAssignedController::getAllAssignedMonitors');
$routes->get('admin/monitor/unassigned', 'Monitor\MonitorUnassignedController::index');
$routes->get('admin/monitor/unassigned/getAllUnassignedMonitors', 'Monitor\MonitorUnassignedController::getAllUnassignedMonitors');

//Keyboard routes
$routes->get('admin/keyboard/product', 'Keyboard\KeyboardProductController::index');
$routes->get('admin/keyboard/product/getAllKeyboardProducts', 'Keyboard\KeyboardProductController::getAllKeyboardProducts');
$routes->get('admin/keyboard/product/(:num)', 'Keyboard\KeyboardProductController::getKeyboardProduct/$1');
$routes->post('admin/keyboard/product/createKeyboardProduct', 'Keyboard\KeyboardProductController::createKeyboardProduct');
$routes->post('admin/keyboard/product/updateKeyboardProduct/(:num)', 'Keyboard\KeyboardProductController::updateKeyboardProduct/$1');
$routes->delete('admin/keyboard/product/deleteKeyboardProduct/(:num)', 'Keyboard\KeyboardProductController::deleteKeyboardProduct/$1');
$routes->post('admin/keyboard/product/assignKeyboard', 'Keyboard\KeyboardProductController::assignKeyboard');
$routes->get('admin/keyboard/product/getAllUnassignKeyboardProducts', 'Keyboard\KeyboardProductController::getAllUnassignKeyboardProducts');
$routes->get('admin/keyboard/product/getAllAssignKeyboardProducts', 'Keyboard\KeyboardProductController::getAllAssignKeyboardProducts');
$routes->post('admin/keyboard/product/unassignKeyboard', 'Keyboard\KeyboardProductController::unassignKeyboard');
$routes->get('admin/keyboard/assigned', 'Keyboard\KeyboardAssignedController::index');
$routes->get('admin/keyboard/assigned/getAllAssignedKeyboards', 'Keyboard\KeyboardAssignedController::getAllAssignedKeyboards');
$routes->get('admin/keyboard/unassigned', 'Keyboard\KeyboardUnassignedController::index');
$routes->get('admin/keyboard/unassigned/getAllUnassignedKeyboards', 'Keyboard\KeyboardUnassignedController::getAllUnassignedKeyboards');

//Mouse routes
$routes->get('admin/mouse/product', 'Mouse\MouseProductController::index');
$routes->get('admin/mouse/product/getAllMouseProducts', 'Mouse\MouseProductController::getAllMouseProducts');
$routes->get('admin/mouse/product/(:num)', 'Mouse\MouseProductController::getMouseProduct/$1');
$routes->post('admin/mouse/product/createMouseProduct', 'Mouse\MouseProductController::createMouseProduct');
$routes->post('admin/mouse/product/updateMouseProduct/(:num)', 'Mouse\MouseProductController::updateMouseProduct/$1');
$routes->delete('admin/mouse/product/deleteMouseProduct/(:num)', 'Mouse\MouseProductController::deleteMouseProduct/$1');
$routes->post('admin/mouse/product/assignMouse', 'Mouse\MouseProductController::assignMouse');
$routes->get('admin/mouse/product/getAllUnassignMouseProducts', 'Mouse\MouseProductController::getAllUnassignMouseProducts');
$routes->get('admin/mouse/product/getAllAssignMouseProducts', 'Mouse\MouseProductController::getAllAssignMouseProducts');
$routes->post('admin/mouse/product/unassignMouse', 'Mouse\MouseProductController::unassignMouse');
$routes->get('admin/mouse/assigned', 'Mouse\MouseAssignedController::index');
$routes->get('admin/mouse/assigned/getAllAssignedMouses', 'Mouse\MouseAssignedController::getAllAssignedMouses');
$routes->get('admin/mouse/unassigned', 'Mouse\MouseUnassignedController::index');
$routes->get('admin/mouse/unassigned/getAllUnassignedMouses', 'Mouse\MouseUnassignedController::getAllUnassignedMouses');