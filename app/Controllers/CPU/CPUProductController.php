<?php

namespace App\Controllers\CPU;

use App\Models\CPUProductModel;
use CodeIgniter\Controller;

class CPUProductController extends Controller
{
    protected $cpuProductModel;

    public function __construct()
    {
        $this->cpuProductModel = new CPUProductModel();
    }

    public function index()
    {
        return view('cpu/product/index');
    }

    public function getCPUProduct($id)
    {
        $product = $this->cpuProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllCPUProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->cpuProductModel->getAllCPUProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignCPUProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->cpuProductModel->getAllUnassignCPUProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignCPUProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->cpuProductModel->getAllAssignCPUProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createCPUProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'cabinet_name' => $this->request->getPost('cabinet_name'),
            'smps_name' => $this->request->getPost('smps_name'),
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

        $result = $this->cpuProductModel->createCPUProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateCPUProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'cabinet_name' => $this->request->getPost('cabinet_name'),
            'smps_name' => $this->request->getPost('smps_name'),
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

        $result = $this->cpuProductModel->updateCPUProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignCPU()
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
        $result = $this->cpuProductModel->updateCPUProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'CPU assigned successfully' : 'Failed to assign cpu'
        ]);
    }

    public function unassignCPU()
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
        $result = $this->cpuProductModel->updateCPUProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'CPU assigned successfully' : 'Failed to assign cpu'
        ]);
    }

    public function deleteCPUProduct($id)
    {
        $result = $this->cpuProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
