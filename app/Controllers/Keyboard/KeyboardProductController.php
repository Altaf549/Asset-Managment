<?php

namespace App\Controllers\Keyboard;

use App\Models\KeyboardProductModel;
use CodeIgniter\Controller;

class KeyboardProductController extends Controller
{
    protected $keyboardProductModel;

    public function __construct()
    {
        $this->keyboardProductModel = new KeyboardProductModel();
    }

    public function index()
    {
        return view('keyboard/product/index');
    }

    public function getKeyboardProduct($id)
    {
        $product = $this->keyboardProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllKeyboardProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->keyboardProductModel->getAllKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignKeyboardProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->keyboardProductModel->getAllUnassignKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignKeyboardProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->keyboardProductModel->getAllAssignKeyboardProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createKeyboardProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'keyboard_type' => $this->request->getPost('keyboard_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->keyboardProductModel->createKeyboardProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateKeyboardProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'keyboard_type' => $this->request->getPost('keyboard_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->keyboardProductModel->updateKeyboardProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignKeyboard()
    {
        $rules = [
            'employeeName' => 'required|string',
            'employee_id' => 'required|integer',
            'asset_id' => 'required|integer',
            'assign_date' => 'required|valid_date',
            'assign_status' => 'required|in_list[yes,no]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed: ' . implode(', ', array_values($this->validator->getErrors()))
            ]);
        }

        $data = [
            'assigned_to' => $this->request->getPost('employeeName'),
            'emp_id' => $this->request->getPost('employee_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $assetId = $this->request->getPost('asset_id');
        $result = $this->keyboardProductModel->updateKeyboardProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Keyboard assigned successfully' : 'Failed to assign keyboard'
        ]);
    }

    public function unassignKeyboard()
    {
        $rules = [
            'asset_id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed: ' . implode(', ', array_values($this->validator->getErrors()))
            ]);
        }

        $data = [
            'assigned_to' => null,
            'emp_id' => null,
            'assign_date' => null,
            'assign_status' => 'no'
        ];

        $assetId = $this->request->getPost('asset_id');
        $result = $this->keyboardProductModel->updateKeyboardProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Keyboard assigned successfully' : 'Failed to assign keyboard'
        ]);
    }

    public function deleteKeyboardProduct($id)
    {
        $result = $this->keyboardProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
