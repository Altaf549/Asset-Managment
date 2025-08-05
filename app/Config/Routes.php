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

//CPU routes
$routes->get('admin/cpu/product', 'CPU\CPUProductController::index');
$routes->get('admin/cpu/product/getAllCPUProducts', 'CPU\CPUProductController::getAllCPUProducts');
$routes->get('admin/cpu/product/(:num)', 'CPU\CPUProductController::getCPUProduct/$1');
$routes->post('admin/cpu/product/createCPUProduct', 'CPU\CPUProductController::createCPUProduct');
$routes->post('admin/cpu/product/updateCPUProduct/(:num)', 'CPU\CPUProductController::updateCPUProduct/$1');
$routes->delete('admin/cpu/product/deleteCPUProduct/(:num)', 'CPU\CPUProductController::deleteCPUProduct/$1');
$routes->post('admin/cpu/product/assignCPU', 'CPU\CPUProductController::assignCPU');
$routes->get('admin/cpu/product/getAllUnassignCPUProducts', 'CPU\CPUProductController::getAllUnassignCPUProducts');
$routes->get('admin/cpu/product/getAllAssignCPUProducts', 'CPU\CPUProductController::getAllAssignCPUProducts');
$routes->post('admin/cpu/product/unassignCPU', 'CPU\CPUProductController::unassignCPU');
$routes->get('admin/cpu/assigned', 'CPU\CPUAssignedController::index');
$routes->get('admin/cpu/assigned/getAllAssignedCPUs', 'CPU\CPUAssignedController::getAllAssignedCPUs');
$routes->get('admin/cpu/unassigned', 'CPU\CPUUnassignedController::index');
$routes->get('admin/cpu/unassigned/getAllUnassignedCPUs', 'CPU\CPUUnassignedController::getAllUnassignedCPUs');

//MAC routes
$routes->get('admin/mac/product', 'MAC\MACProductController::index');
$routes->get('admin/mac/product/getAllMACProducts', 'MAC\MACProductController::getAllMACProducts');
$routes->get('admin/mac/product/(:num)', 'MAC\MACProductController::getMACProduct/$1');
$routes->post('admin/mac/product/createMACProduct', 'MAC\MACProductController::createMACProduct');
$routes->post('admin/mac/product/updateMACProduct/(:num)', 'MAC\MACProductController::updateMACProduct/$1');
$routes->delete('admin/mac/product/deleteMACProduct/(:num)', 'MAC\MACProductController::deleteMACProduct/$1');
$routes->post('admin/mac/product/assignMAC', 'MAC\MACProductController::assignMAC');
$routes->get('admin/mac/product/getAllUnassignMACProducts', 'MAC\MACProductController::getAllUnassignMACProducts');
$routes->get('admin/mac/product/getAllAssignMACProducts', 'MAC\MACProductController::getAllAssignMACProducts');
$routes->post('admin/mac/product/unassignMAC', 'MAC\MACProductController::unassignMAC');
$routes->get('admin/mac/assigned', 'MAC\MACAssignedController::index');
$routes->get('admin/mac/assigned/getAllAssignedMACs', 'MAC\MACAssignedController::getAllAssignedMACs');
$routes->get('admin/mac/unassigned', 'MAC\MACUnassignedController::index');
$routes->get('admin/mac/unassigned/getAllUnassignedMACs', 'MAC\MACUnassignedController::getAllUnassignedMACs');

//Phone routes
$routes->get('admin/phone/product', 'Phone\PhoneProductController::index');
$routes->get('admin/phone/product/getAllPhoneProducts', 'Phone\PhoneProductController::getAllPhoneProducts');
$routes->get('admin/phone/product/(:num)', 'Phone\PhoneProductController::getPhoneProduct/$1');
$routes->post('admin/phone/product/createPhoneProduct', 'Phone\PhoneProductController::createPhoneProduct');
$routes->post('admin/phone/product/updatePhoneProduct/(:num)', 'Phone\PhoneProductController::updatePhoneProduct/$1');
$routes->delete('admin/phone/product/deletePhoneProduct/(:num)', 'Phone\PhoneProductController::deletePhoneProduct/$1');
$routes->post('admin/phone/product/assignPhone', 'Phone\PhoneProductController::assignPhone');
$routes->get('admin/phone/product/getAllUnassignPhoneProducts', 'Phone\PhoneProductController::getAllUnassignPhoneProducts');
$routes->get('admin/phone/product/getAllAssignPhoneProducts', 'Phone\PhoneProductController::getAllAssignPhoneProducts');
$routes->post('admin/phone/product/unassignPhone', 'Phone\PhoneProductController::unassignPhone');
$routes->get('admin/phone/assigned', 'Phone\PhoneAssignedController::index');
$routes->get('admin/phone/assigned/getAllAssignedPhones', 'Phone\PhoneAssignedController::getAllAssignedPhones');
$routes->get('admin/phone/unassigned', 'Phone\PhoneUnassignedController::index');
$routes->get('admin/phone/unassigned/getAllUnassignedPhones', 'Phone\PhoneUnassignedController::getAllUnassignedPhones');

//Other Asset routes
$routes->get('admin/other-asset', 'OtherAssetController::index');
$routes->get('admin/other-asset/getAllOtherAsset', 'OtherAssetController::getAllOtherAsset');
$routes->get('admin/other-asset/(:num)', 'OtherAssetController::getOtherAsset/$1');
$routes->post('admin/other-asset/create', 'OtherAssetController::createOtherAsset');
$routes->post('admin/other-asset/update/(:num)', 'OtherAssetController::updateOtherAsset/$1');
$routes->delete('admin/other-asset/delete/(:num)', 'OtherAssetController::deleteOtherAsset/$1');