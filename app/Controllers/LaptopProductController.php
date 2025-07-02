<?php

namespace App\Controllers;

use App\Models\LaptopProductModel;
use CodeIgniter\Controller;

class LaptopProductController extends Controller
{
    protected $laptopProductModel;

    public function __construct()
    {
        $this->laptopProductModel = new LaptopProductModel();
    }

    public function index()
    {
        return view('laptop/product/index');
    }

    public function getLaptopProduct($id)
    {
        $product = $this->laptopProductModel->find($id);
        if (!$product) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
        }
        return $this->response->setJSON($product);
    }

    public function getAllLaptopProducts()
    {
        $search = $this->request->getVar('search');
        $result = $this->laptopProductModel->getAllLaptopProducts($search);
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createLaptopProduct()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'model_name' => $this->request->getPost('model_name'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
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

        $result = $this->laptopProductModel->createLaptopProduct($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product created successfully' : 'Failed to create product'
        ]);
    }

    public function updateLaptopProduct($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'model_name' => $this->request->getPost('model_name'),
            'manufacturer' => $this->request->getPost('manufacturer'),
            'screen_size' => $this->request->getPost('screen_size'),
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

        $result = $this->laptopProductModel->updateLaptopProduct($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product updated successfully' : 'Failed to update product'
        ]);
    }

    public function assignLaptop()
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
        $result = $this->laptopProductModel->updateLaptopProduct($assetId, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Laptop assigned successfully' : 'Failed to assign laptop'
        ]);
    }

    public function deleteLaptopProduct($id)
    {
        $result = $this->laptopProductModel->delete($id);
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Product deleted successfully' : 'Failed to delete product'
        ]);
    }
}
