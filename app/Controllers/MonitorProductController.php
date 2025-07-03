<?php

namespace App\Controllers;

use App\Models\MonitorProductModel;
use CodeIgniter\Controller;

class MonitorProductController extends Controller
{
    protected $monitorProductModel;

    public function __construct()
    {
        $this->monitorProductModel = new MonitorProductModel();
    }

    public function index()
    {
        return view('monitor/product/index');
    }

    public function getMonitorProduct($id)
    {
        $product = $this->monitorProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllMonitorProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->monitorProductModel->getAllMonitorProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllUnassignMonitorProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->monitorProductModel->getAllUnassignMonitorProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function getAllAssignMonitorProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->monitorProductModel->getAllAssignMonitorProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createMonitorProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
            'resolution' => $this->request->getPost('resolution'),
            'type' => $this->request->getPost('type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->monitorProductModel->createMonitorProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateMonitorProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
            'resolution' => $this->request->getPost('resolution'),
            'type' => $this->request->getPost('type'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'emp_id' => $this->request->getPost('emp_id'),
            'assign_date' => $this->request->getPost('assign_date'),
            'assign_status' => $this->request->getPost('assign_status')
        ];

        $result = $this->monitorProductModel->updateMonitorProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignMonitor()
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
        $result = $this->monitorProductModel->updateMonitorProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Monitor assigned successfully' : 'Failed to assign monitor'
        ]);
    }

    public function unassignMonitor()
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
        $result = $this->monitorProductModel->updateMonitorProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Monitor assigned successfully' : 'Failed to assign monitor'
        ]);
    }

    public function deleteMonitorProduct($id)
    {
        $result = $this->monitorProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
