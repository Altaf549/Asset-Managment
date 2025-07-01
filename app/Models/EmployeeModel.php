<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'tbl_employee';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['emp_name', 'emp_id', 'created_at', 'updated_at', 'is_active'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = '';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct()
    {
        parent::__construct();
        try {
            // Test database connection
            $this->db = db_connect();
            $this->db->query('SELECT 1');
        } catch (\Exception $e) {
            log_message('error', 'Database connection failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getEmployees($page = 1, $perPage = 10)
    {
        try {
            // Verify table exists
            $this->db->table($this->table)->countAllResults();
            
            // Build query step by step with error checking
            $builder = $this->builder();
            
            // Test select query
            $testSelect = $builder->select('id')->get();
            if ($testSelect === false) {
                throw new \Exception('Failed to execute select query');
            }
            
            // Get total rows
            $totalRows = $builder->countAllResults();
            
            // Calculate offset for pagination
            $offset = ($page - 1) * $perPage;
            
            // Get employees with manual pagination
            $employees = $builder
                ->select('id, emp_name, emp_id, created_at, is_active')
                ->orderBy('created_at', 'DESC')
                ->limit($perPage, $offset)
                ->get()
                ->getResultArray();

            if (empty($employees)) {
                throw new \Exception('No employees found for this page');
            }

            // Convert 'yes'/'no' to boolean for frontend
            foreach ($employees as &$employee) {
                $employee['isActive'] = $employee['is_active'] === 'yes';
            }

            return [
                'data' => $employees,
                'totalRows' => $totalRows,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($totalRows / $perPage)
            ];
        } catch (\Exception $e) {
            log_message('error', 'Error in getEmployees: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            // Return error response
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'data' => [],
                'totalRows' => 0,
                'currentPage' => $page,
                'perPage' => $perPage
            ];
        }

        return [
            'data' => $employees,
            'totalRows' => $totalRows,
            'currentPage' => $page,
            'perPage' => $perPage
        ];
    }

    public function createEmployee($data)
    {
        // Convert boolean isActive to 'yes'/'no'
        if (isset($data['isActive'])) {
            $data['is_active'] = $data['isActive'] ? 'yes' : 'no';
            unset($data['isActive']);
        }
        return $this->insert($data);
    }

    public function updateEmployee($id, $data)
    {
        // Convert boolean isActive to 'yes'/'no'
        if (isset($data['isActive'])) {
            $data['is_active'] = $data['isActive'] ? 'yes' : 'no';
            unset($data['isActive']);
        }
        
        // If is_active is being updated, ensure it's either 'yes' or 'no'
        if (isset($data['is_active'])) {
            $data['is_active'] = $data['is_active'] === 'yes' ? 'yes' : 'no';
        }
        
        return $this->update($id, $data);
    }

    public function toggleStatus($id)
    {
        $employee = $this->find($id);
        if (!$employee) {
            return false;
        }

        // Toggle between 'yes' and 'no'
        $newStatus = $employee['is_active'] === 'yes' ? 'no' : 'yes';
        return $this->update($id, ['is_active' => $newStatus]);
    }

    public function deleteEmployee($id)
    {
        return $this->delete($id);
    }
}
