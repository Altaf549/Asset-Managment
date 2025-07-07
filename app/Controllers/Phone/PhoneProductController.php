<?php

namespace App\Controllers\Phone;

use App\Models\PhoneProductModel;
use CodeIgniter\Controller;

class PhoneProductController extends Controller
{
    protected $phoneProductModel;

    public function __construct()
    {
        $this->phoneProductModel = new PhoneProductModel();
    }

    public function index()
    {
        return view('phone/product/index');
    }

    public function getPhoneProduct($id)
    {
        $product = $this->phoneProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllPhoneProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->phoneProductModel->getAllPhoneProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignPhoneProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->phoneProductModel->getAllUnassignPhoneProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignPhoneProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->phoneProductModel->getAllAssignPhoneProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createPhoneProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'model' => $this->request->getPost('model'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
            'ram' => $this->request->getPost('ram'),
            'storage' => $this->request->getPost('storage'),
            'os' => $this->request->getPost('os'),
            'device_type' => $this->request->getPost('device_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->phoneProductModel->createPhoneProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updatePhoneProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'model' => $this->request->getPost('model'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
            'ram' => $this->request->getPost('ram'),
            'storage' => $this->request->getPost('storage'),
            'os' => $this->request->getPost('os'),
            'device_type' => $this->request->getPost('device_type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->phoneProductModel->updatePhoneProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignPhone()
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
        $result = $this->phoneProductModel->updatePhoneProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Phone assigned successfully' : 'Failed to assign phone'
        ]);
    }

    public function unassignPhone()
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
        $result = $this->phoneProductModel->updatePhoneProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Phone assigned successfully' : 'Failed to assign phone'
        ]);
    }

    public function deletePhoneProduct($id)
    {
        $result = $this->phoneProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
