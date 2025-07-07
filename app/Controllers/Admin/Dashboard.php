<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }
        $dashboardModel = new \App\Models\DashboardModel();
        $stats = [
            ['icon' => 'bi-person', 'color' => 'text-info', 'title' => 'Employees', 'value' => $dashboardModel->getEmployeeCount()],
            ['icon' => 'bi-laptop', 'color' => 'text-primary', 'title' => 'Total Laptops', 'value' => $dashboardModel->getLaptopCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned Laptops', 'value' => $dashboardModel->getAssignedLaptopCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned Laptops', 'value' => $dashboardModel->getUnassignedLaptopCount()],
            ['icon' => 'bi-display', 'color' => 'text-primary', 'title' => 'Total Monitors', 'value' => $dashboardModel->getMonitorCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned Monitors', 'value' => $dashboardModel->getAssignedMonitorCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned Monitors', 'value' => $dashboardModel->getUnassignedMonitorCount()],
            ['icon' => 'bi-motherboard', 'color' => 'text-primary', 'title' => 'Total CPUs', 'value' => $dashboardModel->getCPUCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned CPUs', 'value' => $dashboardModel->getAssignedCPUCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned CPUs', 'value' => $dashboardModel->getUnassignedCPUCount()],
            ['icon' => 'bi-apple', 'color' => 'text-primary', 'title' => 'Total MACs', 'value' => $dashboardModel->getMACCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned MACs', 'value' => $dashboardModel->getAssignedMACCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned MACs', 'value' => $dashboardModel->getUnassignedMACCount()],
            ['icon' => 'bi-keyboard', 'color' => 'text-primary', 'title' => 'Total Keyboards', 'value' => $dashboardModel->getKeyboardCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned Keyboards', 'value' => $dashboardModel->getAssignedKeyboardCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned Keyboards', 'value' => $dashboardModel->getUnassignedKeyboardCount()],
            ['icon' => 'bi-mouse', 'color' => 'text-primary', 'title' => 'Total Mouses', 'value' => $dashboardModel->getMouseCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned Mouses', 'value' => $dashboardModel->getAssignedMouseCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned Mouses', 'value' => $dashboardModel->getUnassignedMouseCount()],
            ['icon' => 'bi-phone', 'color' => 'text-primary', 'title' => 'Total Phones', 'value' => $dashboardModel->getPhoneCount()],
            ['icon' => 'bi-check-circle-fill', 'color' => 'text-success', 'title' => 'Assigned Phones', 'value' => $dashboardModel->getAssignedPhoneCount()],
            ['icon' => 'bi-x-circle-fill', 'color' => 'text-danger', 'title' => 'Unassigned Phones', 'value' => $dashboardModel->getUnassignedPhoneCount()],
            ['icon' => 'bi-archive', 'color' => 'text-primary', 'title' => 'Total Other Assets', 'value' => $dashboardModel->getOtherAssetCount()]
        ];

        $data = [
            'title' => 'Admin Dashboard',
            'page' => 'dashboard',
            'stats' => $stats
        ];
        
        return view('admin/dashboard', $data);
    }
}
