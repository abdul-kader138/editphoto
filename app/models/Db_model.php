<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function getTotalMRApproval($id = NULL)
    {
        $this->db->select('count(id) as total', FALSE)
            ->where('aprrover_id ', $id)
            ->where('approve_status ', 0);
        $q = $this->db->get_where('approve_details',array('interface_name'=>'add_manpower_requisition'));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getTotalRAApproval($id = NULL)
    {
        $this->db->select('count(id) as total', FALSE)
            ->where('aprrover_id ', $id)
            ->where('approve_status ', 0);
        $q = $this->db->get_where('approve_details',array('interface_name'=>'add_recruitment_approval'));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getTotalCRApproval($id = NULL)
    {
        $this->db->select('count(id) as total', FALSE)
            ->where('aprrover_id ', $id)
            ->where('approve_status ', 0);
        $q = $this->db->get_where('approve_details_others',array('interface_name'=>'Correction Request'));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getTotalUsers()
    {
        $this->db->select('count(id) as total', FALSE);
        if (!$this->Owner && !$this->Admin) $this->db->where('users.id', $this->session->userdata('user_id'));
        $q = $this->db->get('users');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
}
