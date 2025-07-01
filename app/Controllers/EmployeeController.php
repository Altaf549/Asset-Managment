<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class EmployeeController extends Controller
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        return view('employees/index');
    }

    public function getEmployee($id)
    {
        $employee = $this->employeeModel->find($id);
        if (!$employee) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Employee not found']);
        }

        // Convert database 'yes'/'no' to boolean for frontend
        $employee['isActive'] = $employee['is_active'] === 'yes';
        $employee['joining_date'] = $employee['joining_date'] ?? date('Y-m-d');
        
        return $this->response->setJSON($employee);
    }

    public function getAllEmployees()
    {
        $search = $this->request->getVar('search');
        $result = $this->employeeModel->getAllEmployees($search);
        
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createEmployee()
    {
        $data = [
            'emp_name' => $this->request->getPost('emp_name'),
            'emp_id' => $this->request->getPost('emp_id'),
            'joining_date' => $this->request->getPost('joining_date'),
            'is_active' => $this->request->getPost('isActive') === 'yes' ? 'yes' : 'no'
        ];

        $result = $this->employeeModel->createEmployee($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Employee created successfully' : 'Failed to create employee'
        ]);
    }

    public function updateEmployee($id)
    {
        
        $data = [
            'emp_name' => $this->request->getPost('emp_name'),
            'emp_id' => $this->request->getPost('emp_id'),
            'joining_date' => $this->request->getPost('joining_date'),
            'is_active' => $this->request->getPost('isActive')
        ];
        $result = $this->employeeModel->updateEmployee($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Employee updated successfully' : 'Failed to update employee'
        ]);
    }

    public function toggleStatus($id)
    {
        $employee = $this->employeeModel->find($id);
        if (!$employee) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Employee not found']);
        }

        // Get the current status and toggle it
        $currentStatus = $employee['is_active'];
        $newStatus = $currentStatus === 'yes' ? 'no' : 'yes';
        
        $result = $this->employeeModel->updateEmployee($id, ['is_active' => $newStatus]);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Status updated successfully' : 'Failed to update status',
            'is_active' => $newStatus === 'yes'
        ]);
    }

    public function deleteEmployee($id)
    {
        $result = $this->employeeModel->deleteEmployee($id);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'Employee deleted successfully' : 'Failed to delete employee'
        ]);
    }
}
