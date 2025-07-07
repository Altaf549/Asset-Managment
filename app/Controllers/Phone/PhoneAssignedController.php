<?php

namespace App\Controllers\Phone;

use App\Models\PhoneProductModel;
use CodeIgniter\Controller;

class PhoneAssignedController extends Controller
{
    protected $phoneProductModel;

    public function __construct()
    {
        $this->phoneProductModel = new PhoneProductModel();
    }

    public function index()
    {
        return view('phone/assigned/index');
    }

    public function getAllAssignedPhones()
    {
        $search = $this->request->getVar('search');
        $result = $this->phoneProductModel->getAllAssignPhoneProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
