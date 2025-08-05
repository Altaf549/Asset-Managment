<?php

namespace App\Controllers\MAC;

use App\Models\MACProductModel;
use CodeIgniter\Controller;

class MACProductController extends Controller
{
    protected $macProductModel;

    public function __construct()
    {
        $this->macProductModel = new MACProductModel();
    }

    public function index()
    {
        return view('mac/product/index');
    }

    public function getMACProduct($id)
    {
        $product = $this->macProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllMACProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->macProductModel->getAllMACProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignMACProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->macProductModel->getAllUnassignMACProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignMACProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->macProductModel->getAllAssignMACProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createMACProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'cabinet_name' => $this->request->getPost('cabinet_name'),
            'serial_number' => $this->request->getPost('serial_number'),
            'ram' => $this->request->getPost('ram'),
            'ram_model' => $this->request->getPost('ram_model'),
            'ram_fsb' => $this->request->getPost('ram_fsb'),
            'ssd' => $this->request->getPost('ssd'),
            'hard_disk' => $this->request->getPost('hard_disk'),
            'processor_company' => $this->request->getPost('processor_company'),
            'processor' => $this->request->getPost('processor'),
            'processor_generation' => $this->request->getPost('processor_generation'),
            'motherboard' => $this->request->getPost('motherboard'),
            'motherboard_model' => $this->request->getPost('motherboard_model'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->macProductModel->createMACProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateMACProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'cabinet_name' => $this->request->getPost('cabinet_name'),
            'serial_number' => $this->request->getPost('serial_number'),
            'ram' => $this->request->getPost('ram'),
            'ram_model' => $this->request->getPost('ram_model'),
            'ram_fsb' => $this->request->getPost('ram_fsb'),
            'ssd' => $this->request->getPost('ssd'),
            'hard_disk' => $this->request->getPost('hard_disk'),
            'processor_company' => $this->request->getPost('processor_company'),
            'processor' => $this->request->getPost('processor'),
            'processor_generation' => $this->request->getPost('processor_generation'),
            'motherboard' => $this->request->getPost('motherboard'),
            'motherboard_model' => $this->request->getPost('motherboard_model'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->macProductModel->updateMACProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignMAC()
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
        $result = $this->macProductModel->updateMACProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'MAC assigned successfully' : 'Failed to assign mac'
        ]);
    }

    public function unassignMAC()
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
        $result = $this->macProductModel->updateMACProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'MAC assigned successfully' : 'Failed to assign mac'
        ]);
    }

    public function deleteMACProduct($id)
    {
        $result = $this->macProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
