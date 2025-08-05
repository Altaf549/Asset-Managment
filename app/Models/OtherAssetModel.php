<?php

namespace App\Models;

use CodeIgniter\Model;

class OtherAssetModel extends Model
{
    protected $table = 'tbl_other_asset';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['asset_id', 'name', 'count', 'created_at', 'updated_at', 'is_active'];
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

    public function getAllOtherAsset($search = null)
    {
        try {
            // Verify table exists
            $this->db->table($this->table)->select('id')->get();
            
            // Build query step by step with error checking
            $builder = $this->builder();
            
            // Add search functionality
            if ($search) {
                $builder->groupStart()
                    ->like('asset_id', $search)
                    ->orLike('name', $search)
                    ->groupEnd();
            }
            
            // Get total rows
            $totalRows = $builder->countAllResults(false);
            
            // Get all employees
            $otherAsset = $builder
                ->select('id, asset_id, name, count, created_at')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();

            if (empty($otherAsset)) {
                throw new \Exception('No other asset found');
            }

            return [
                'data' => $otherAsset,
                'totalRows' => $totalRows
            ];
        } catch (\Exception $e) {
            log_message('error', 'Error in getAllOtherAssets: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            // Return error response
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'data' => [],
                'totalRows' => 0
            ];
        }

        return [
            'data' => $employees,
            'totalRows' => $totalRows
        ];
    }

    public function createOtherAsset($data)
    {
        return $this->insert($data);
    }

    public function updateOtherAsset($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOtherAsset($id)
    {
        return $this->delete($id);
    }
}
