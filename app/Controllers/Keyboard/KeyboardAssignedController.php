<?php

namespace App\Controllers\Keyboard;

use App\Models\KeyboardProductModel;
use CodeIgniter\Controller;

class KeyboardAssignedController extends Controller
{
    protected $keyboardProductModel;

    public function __construct()
    {
        $this->keyboardProductModel = new KeyboardProductModel();
    }

    public function index()
    {
        return view('keyboard/assigned/index');
    }

    public function getAllAssignedKeyboards()
    {
        $search = $this->request->getVar('search');
        $result = $this->keyboardProductModel->getAllAssignKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
