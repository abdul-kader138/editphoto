<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HR_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }


    public function addMR($data = array(),$approve_data = array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->insert('manpower_requisition', $data);
        $cid = $this->db->insert_id();
        $approve_data['application_id'] = $cid;
//        $approve_data['application_id'] = 1000;
        $this->db->insert('approve_details', $approve_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }



    public function getMRById($id)
    {
        $q = $this->db->get_where('manpower_requisition', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function deleteMR($id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->delete('manpower_requisition', array('id' => $id));
        $this->db->delete('approve_details', array('application_id' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function updateMR($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('manpower_requisition', $data)) {
            return true;
        }
        return false;
    }

    public function getCompanyById($id)
    {
        $q = $this->db->get_where('company', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getDesignationById($id)
    {
        $q = $this->db->get_where('designations', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getApproverList($name)
    {
        $q = $this->db->get_where('approver_list', array('interface_name' => $name,'status'=>0), 1);
        $this->db->order_by('approver_seq', 'asc');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getUsersByID($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getApproversList($interface_name,$category_id) {
        if(empty($category_id)) $category_id=665;
        $this->db->where(array('interface_name' =>$interface_name,'status'=>0,'category_id'=>$category_id))->order_by('approver_seq','asc');
        $q = $this->db->get("approver_list");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getApproverDetails($id,$application_id,$category_id,$interface_name) {
        $this->db->select("approve_details.*,CONCAT({$this->db->dbprefix('users')}.first_name, ' ', {$this->db->dbprefix('users')}.last_name) as username", false)
            ->join('users', 'users.id=approve_details.aprrover_id', 'inner');
        $q = $this->db->get_where('approve_details', array('aprrover_id' =>$id,'category_id'=>$category_id,'interface_name'=>$interface_name,'application_id' =>$application_id,'approve_status'=>1));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addRA($data = array(),$approve_data = array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->insert('recruitment_approval', $data);
        $cid = $this->db->insert_id();
        $approve_data['application_id'] = $cid;
        $this->db->insert('approve_details', $approve_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function getRAById($id)
    {
        $q = $this->db->get_where('recruitment_approval', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updateRA($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('recruitment_approval', $data)) {
            return true;
        }
        return false;
    }

    public function deleteRA($id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->delete('recruitment_approval', array('id' => $id));
        $this->db->delete('approve_details', array('application_id' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
}