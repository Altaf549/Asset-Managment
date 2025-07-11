<?php

namespace App\Models;

use CodeIgniter\Model;

class KeyboardProductModel extends Model
{
    protected $table = 'tbl_keyboard';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'asset_id',
        'manufacturer',
        'keyboard_type',
        'assigned_to',
        'emp_id',
        'assign_status',
        'assign_date',
        'created_at',
    ];
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

    public function getAllKeyboardProducts($search = null)
    {
        try {
            $builder = $this->builder();
            
            if ($search) {
                $builder->groupStart()
                    ->like('asset_id', $search)
                    ->orLike('serial_number', $search)
                    ->orLike('manufacturer', $search)
                    ->orLike('assigned_to', $search)
                    ->groupEnd();
            }
            
            $totalRows = $builder->countAllResults(false);
            
            $products = $builder
                ->select('id, asset_id, manufacturer, keyboard_type, assigned_to, emp_id, assign_date, assign_status, created_at')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();

            if (empty($products)) {
                throw new \Exception('No products found');
            }

            return [
                'data' => $products,
                'totalRows' => $totalRows
            ];
        } catch (\Exception $e) {
            log_message('error', 'Error in getAllKeyboardProducts: ' . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'data' => [],
                'totalRows' => 0
            ];
        }
    }

    public function getAllUnassignKeyboardProducts($search = null)
    {
        try {
            $builder = $this->builder();
            
            if ($search) {
                $builder->groupStart()
                    ->like('asset_id', $search)
                    ->orLike('serial_number', $search)
                    ->orLike('manufacturer', $search)
                    ->orLike('assigned_to', $search)
                    ->groupEnd();
            }
            
            $totalRows = $builder->countAllResults(false);
            
            $products = $builder
                ->select('id, asset_id, manufacturer, keyboard_type, assigned_to, emp_id, assign_date, assign_status, created_at')
                ->where('emp_id', null)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();

            if (empty($products)) {
                throw new \Exception('No products found');
            }

            return [
                'data' => $products,
                'totalRows' => $totalRows
            ];
        } catch (\Exception $e) {
            log_message('error', 'Error in getAllKeyboardProducts: ' . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'data' => [],
                'totalRows' => 0
            ];
        }
    }

    public function getAllAssignKeyboardProducts($search = null)
    {
        try {
            $builder = $this->builder();
            
            if ($search) {
                $builder->groupStart()
                    ->like('asset_id', $search)
                    ->orLike('serial_number', $search)
                    ->orLike('manufacturer', $search)
                    ->orLike('assigned_to', $search)
                    ->groupEnd();
            }
            
            $totalRows = $builder->countAllResults(false);
            
            $products = $builder
                ->select('id, asset_id, manufacturer, keyboard_type, assigned_to, emp_id, assign_date, assign_status, created_at')
                ->where('emp_id !=', null)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();

            if (empty($products)) {
                throw new \Exception('No products found');
            }

            return [
                'data' => $products,
                'totalRows' => $totalRows
            ];
        } catch (\Exception $e) {
            log_message('error', 'Error in getAllKeyboardProducts: ' . $e->getMessage());
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'data' => [],
                'totalRows' => 0
            ];
        }
    }

    public function createKeyboardProduct($data)
    {
        return $this->insert($data);
    }

    public function updateKeyboardProduct($id, $data)
    {
        return $this->update($id, $data);
    }
}
