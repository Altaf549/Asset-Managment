<?php

namespace App\Controllers\Mouse;

use App\Models\MouseProductModel;
use CodeIgniter\Controller;

class MouseUnassignedController extends Controller
{
    protected $mouseProductModel;

    public function __construct()
    {
        $this->mouseProductModel = new MouseProductModel();
    }

    public function index()
    {
        return view('mouse/unassigned/index');
    }

    public function getAllUnassignedMouses()
    {
        $search = $this->request->getVar('search');
        $result = $this->mouseProductModel->getAllUnassignMouseProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
