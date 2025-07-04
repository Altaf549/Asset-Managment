<?php

namespace App\Controllers\Keyboard;

use App\Models\KeyboardProductModel;
use CodeIgniter\Controller;

class KeyboardUnassignedController extends Controller
{
    protected $KeyboardProductModel;

    public function __construct()
    {
        $this->KeyboardProductModel = new KeyboardProductModel();
    }

    public function index()
    {
        return view('Keyboard/unassigned/index');
    }

    public function getAllUnassignedKeyboards()
    {
        $search = $this->request->getVar('search');
        $result = $this->KeyboardProductModel->getAllUnassignKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
