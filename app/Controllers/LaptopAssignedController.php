<?php

namespace App\Controllers;

use App\Models\LaptopProductModel;
use CodeIgniter\Controller;

class LaptopAssignedController extends Controller
{
    protected $laptopProductModel;

    public function __construct()
    {
        $this->laptopProductModel = new LaptopProductModel();
    }

    public function index()
    {
        return view('laptop/assigned/index');
    }

    public function getAllAssignedLaptops()
    {
        $search = $this->request->getVar('search');
        $result = $this->laptopProductModel->getAllAssignLaptopProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
