<?php

namespace App\Controllers;

use App\Models\MonitorProductModel;
use CodeIgniter\Controller;

class MonitorAssignedController extends Controller
{
    protected $monitorProductModel;

    public function __construct()
    {
        $this->monitorProductModel = new MonitorProductModel();
    }

    public function index()
    {
        return view('monitor/assigned/index');
    }

    public function getAllAssignedMonitors()
    {
        $search = $this->request->getVar('search');
        $result = $this->monitorProductModel->getAllAssignMonitorProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
