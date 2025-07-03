<?php

namespace App\Controllers;

use App\Models\LaptopProductModel;
use CodeIgniter\Controller;

class LaptopUnassignedController extends Controller
{
    protected $laptopProductModel;

    public function __construct()
    {
        $this->laptopProductModel = new LaptopProductModel();
    }

    public function index()
    {
        return view('laptop/unassigned/index');
    }

    public function getAllUnassignedLaptops()
    {
        $search = $this->request->getVar('search');
        $result = $this->laptopProductModel->getAllUnassignLaptopProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
