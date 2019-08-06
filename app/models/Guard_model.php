<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 20-Oct-18
 * Time: 2:21 PM
 */

class Guard_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCompanies()
    {
        $q = $this->db->get("company");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllOperators()
    {
        $q = $this->db->get("operators");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllPackages()
    {
        $q = $this->db->get("packages");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllDesignations()
    {
        $q = $this->db->get("designations");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function addGuard($data = array())
    {
        if ($this->db->insert('guards', $data)) {
            $cid = $this->db->insert_id();
            return $cid;
        }
        return false;
    }

    public function updateGuard($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('guards', $data)) {
            return true;
        }
        return false;
    }

    public function getGuardById($id)
    {
        $q = $this->db->get_where('guards', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function deleteGuard($id)
    {
        if ($this->db->delete('guards', array('id' => $id)))  return true;
        else return FALSE;
    }

    public function getALlGuardDetails($id)
    {
        $this->db->select('guards.employee_id,guards.name as nam,guards.mobile_number, guards.dob,(floor(datediff(curdate(),dob) / 365)) as age,guards.present_weight as weight,concat(height_feet,",",height_inch) as height, joining_date,guards.active,company.name as c_name,designations.name as d_name')
            ->join('company', 'guards.company_id=company.id', 'left')
            ->join('designations', 'guards.designation_id=designations.id', 'left')
            ->group_by('guards.id')
            ->order_by('guards.id', 'asc');

        $q = $this->db->get_where('guards', array('guards.id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;

    }


    public function getGuardDetails($id)
    {
        $this->db->select('guards.employee_id,guards.name as nam,guards.mobile_number, guards.dob,(floor(datediff(curdate(),dob) / 365)) as age,guards.present_weight as weight,height_feet,height_inch, joining_date,guards.active')
            ->join('company', 'guards.company_id=company.id', 'left')
            ->join('designations', 'guards.designation_id=designations.id', 'left')
            ->group_by('guards.id')
            ->order_by('guards.id', 'asc');

        $q = $this->db->get_where('guards', array('guards.employee_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;

    }


    public function addWeightDetails($data)
    {
        if ($this->db->insert_batch('weight_details', $data)) {
            return true;
        }
        return false;
    }
} 