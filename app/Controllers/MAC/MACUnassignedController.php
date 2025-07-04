<?php

namespace App\Controllers\MAC;

use App\Models\MACProductModel;
use CodeIgniter\Controller;

class MACUnassignedController extends Controller
{
    protected $macProductModel;

    public function __construct()
    {
        $this->macProductModel = new MACProductModel();
    }

    public function index()
    {
        return view('mac/unassigned/index');
    }

    public function getAllUnassignedMACs()
    {
        $search = $this->request->getVar('search');
        $result = $this->macProductModel->getAllUnassignMACProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
