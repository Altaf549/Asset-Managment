<?php

namespace App\Controllers;

use App\Models\MonitorProductModel;
use CodeIgniter\Controller;

class MonitorUnassignedController extends Controller
{
    protected $monitorProductModel;

    public function __construct()
    {
        $this->monitorProductModel = new MonitorProductModel();
    }

    public function index()
    {
        return view('monitor/unassigned/index');
    }

    public function getAllUnassignedMonitors()
    {
        $search = $this->request->getVar('search');
        $result = $this->monitorProductModel->getAllUnassignMonitorProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
