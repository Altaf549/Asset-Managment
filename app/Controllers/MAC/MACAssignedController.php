<?php

namespace App\Controllers\MAC;

use App\Models\MACProductModel;
use CodeIgniter\Controller;

class MACAssignedController extends Controller
{
    protected $macProductModel;

    public function __construct()
    {
        $this->macProductModel = new MACProductModel();
    }

    public function index()
    {
        return view('mac/assigned/index');
    }

    public function getAllAssignedMACs()
    {
        $search = $this->request->getVar('search');
        $result = $this->macProductModel->getAllAssignMACProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
