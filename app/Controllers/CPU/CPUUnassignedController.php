<?php

namespace App\Controllers\CPU;

use App\Models\CPUProductModel;
use CodeIgniter\Controller;

class CPUUnassignedController extends Controller
{
    protected $cpuProductModel;

    public function __construct()
    {
        $this->cpuProductModel = new CPUProductModel();
    }

    public function index()
    {
        return view('cpu/unassigned/index');
    }

    public function getAllUnassignedCPUs()
    {
        $search = $this->request->getVar('search');
        $result = $this->cpuProductModel->getAllUnassignCPUProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
