<?php

namespace App\Controllers\CPU;

use App\Models\CPUProductModel;
use CodeIgniter\Controller;

class CPUAssignedController extends Controller
{
    protected $cpuProductModel;

    public function __construct()
    {
        $this->cpuProductModel = new CPUProductModel();
    }

    public function index()
    {
        return view('cpu/assigned/index');
    }

    public function getAllAssignedCPUs()
    {
        $search = $this->request->getVar('search');
        $result = $this->cpuProductModel->getAllAssignCPUProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
