<?php

namespace App\Controllers\Mouse;

use App\Models\MouseProductModel;
use CodeIgniter\Controller;

class MouseProductController extends Controller
{
    protected $mouseProductModel;

    public function __construct()
    {
        $this->mouseProductModel = new MouseProductModel();
    }

    public function index()
    {
        return view('mouse/product/index');
    }

    public function getMouseProduct($id)
    {
        $product = $this->mouseProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllMouseProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->mouseProductModel->getAllMouseProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignMouseProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->mouseProductModel->getAllUnassignMouseProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignMouseProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->mouseProductModel->getAllAssignMouseProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createMouseProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'mouse_type' => $this->request->getPost('mouse_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->mouseProductModel->createMouseProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateMouseProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'mouse_type' => $this->request->getPost('mouse_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->mouseProductModel->updateMouseProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignMouse()
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
        $result = $this->mouseProductModel->updateMouseProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Mouse assigned successfully' : 'Failed to assign mouse'
        ]);
    }

    public function unassignMouse()
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
        $result = $this->mouseProductModel->updateMouseProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Mouse assigned successfully' : 'Failed to assign mouse'
        ]);
    }

    public function deleteMouseProduct($id)
    {
        $result = $this->mouseProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
