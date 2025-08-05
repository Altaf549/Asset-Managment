<?php

namespace App\Controllers\Mouse;

use App\Models\MouseProductModel;
use CodeIgniter\Controller;

class MouseAssignedController extends Controller
{
    protected $mouseProductModel;

    public function __construct()
    {
        $this->mouseProductModel = new MouseProductModel();
    }

    public function index()
    {
        return view('mouse/assigned/index');
    }

    public function getAllAssignedMouses()
    {
        $search = $this->request->getVar('search');
        $result = $this->mouseProductModel->getAllAssignMouseProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
