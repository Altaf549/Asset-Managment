<?php

namespace App\Controllers\Keyboard;

use App\Models\KeyboardProductModel;
use CodeIgniter\Controller;

class KeyboardUnassignedController extends Controller
{
    protected $keyboardProductModel;

    public function __construct()
    {
        $this->keyboardProductModel = new KeyboardProductModel();
    }

    public function index()
    {
        return view('keyboard/unassigned/index');
    }

    public function getAllUnassignedKeyboards()
    {
        $search = $this->request->getVar('search');
        $result = $this->keyboardProductModel->getAllUnassignKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }
}
