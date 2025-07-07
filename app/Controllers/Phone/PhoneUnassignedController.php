<?php

namespace App\Controllers\Phone;

use App\Models\PhoneProductModel;
use CodeIgniter\Controller;

class PhoneUnassignedController extends Controller
{
    protected $phoneProductModel;

    public function __construct()
    {
        $this->phoneProductModel = new PhoneProductModel();
    }

    public function index()
    {
        return view('phone/unassigned/index');
    }

    public function getAllUnassignedPhones()
    {
        $search = $this->request->getVar('search');
        $result = $this->phoneProductModel->getAllUnassignPhoneProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
