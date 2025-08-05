<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getEmployeeCount()
    {
        return $this->db->table('tbl_employee')->where('is_active', 'yes')->countAll();
    }
    public function getLaptopCount()
    {
        return $this->db->table('tbl_laptop')->countAll();
    }

    public function getAssignedLaptopCount()
    {
        return $this->db->table('tbl_laptop')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedLaptopCount()
    {
        return $this->db->table('tbl_laptop')->where('assign_status', 'no')->countAllResults();
    }

    public function getMonitorCount()
    {
        return $this->db->table('tbl_monitor')->countAll();
    }

    public function getAssignedMonitorCount()
    {
        return $this->db->table('tbl_monitor')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedMonitorCount()
    {
        return $this->db->table('tbl_monitor')->where('assign_status', 'no')->countAllResults();
    }

    public function getCPUCount()
    {
        return $this->db->table('tbl_cpu')->countAll();
    }

    public function getAssignedCPUCount()
    {
        return $this->db->table('tbl_cpu')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedCPUCount()
    {
        return $this->db->table('tbl_cpu')->where('assign_status', 'no')->countAllResults();
    }

    public function getMACCount()
    {
        return $this->db->table('tbl_mac')->countAll();
    }

    public function getAssignedMACCount()
    {
        return $this->db->table('tbl_mac')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedMACCount()
    {
        return $this->db->table('tbl_mac')->where('assign_status', 'no')->countAllResults();
    }

    public function getKeyboardCount()
    {
        return $this->db->table('tbl_keyboard')->countAll();
    }

    public function getAssignedKeyboardCount()
    {
        return $this->db->table('tbl_keyboard')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedKeyboardCount()
    {
        return $this->db->table('tbl_keyboard')->where('assign_status', 'no')->countAllResults();
    }

    public function getMouseCount()
    {
        return $this->db->table('tbl_mouse')->countAll();
    }

    public function getAssignedMouseCount()
    {
        return $this->db->table('tbl_mouse')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedMouseCount()
    {
        return $this->db->table('tbl_mouse')->where('assign_status', 'no')->countAllResults();
    }

    public function getPhoneCount()
    {
        return $this->db->table('tbl_phone')->countAll();
    }

    public function getAssignedPhoneCount()
    {
        return $this->db->table('tbl_phone')->where('assign_status', 'yes')->countAllResults();
    }

    public function getUnassignedPhoneCount()
    {
        return $this->db->table('tbl_phone')->where('assign_status', 'no')->countAllResults();
    }

    public function getOtherAssetCount()
    {
        return $this->db->table('tbl_other_asset')->countAll();
    }
}