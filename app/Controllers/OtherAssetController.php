<?php

namespace App\Controllers;

use App\Models\OtherAssetModel;
use CodeIgniter\Controller;

class OtherAssetController extends Controller
{
    protected $otherAssetModel;

    public function __construct()
    {
        $this->otherAssetModel = new OtherAssetModel();
    }

    public function index()
    {
        return view('otherAsset/index');
    }

    public function getOtherAsset($id)
    {
        $otherAsset = $this->otherAssetModel->find($id);
        if (!$otherAsset) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Other Asset not found']);
        }
        return $this->response->setJSON($otherAsset);
    }

    public function getAllOtherAsset()
    {
        $search = $this->request->getVar('search');
        $result = $this->otherAssetModel->getAllOtherAsset($search);
        
        return $this->response->setJSON([
            'data' => $result['data'],
            'totalRows' => $result['totalRows']
        ]);
    }

    public function createOtherAsset()
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'name' => $this->request->getPost('name'),
            'count' => $this->request->getPost('count')
        ];

        $result = $this->otherAssetModel->createOtherAsset($data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'OtherAsset created successfully' : 'Failed to create other asset'
        ]);
    }

    public function updateOtherAsset($id)
    {
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'name' => $this->request->getPost('name'),
            'count' => $this->request->getPost('count')
        ];
        $result = $this->otherAssetModel->updateOtherAsset($id, $data);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'OtherAsset updated successfully' : 'Failed to update other asset'
        ]);
    }

    public function deleteOtherAsset($id)
    {
        $result = $this->otherAssetModel->deleteOtherAsset($id);
        
        return $this->response->setJSON([
            'success' => $result !== false,
            'message' => $result !== false ? 'OtherAsset deleted successfully' : 'Failed to delete other asset'
        ]);
    }
}
