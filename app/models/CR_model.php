<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 13-Jul-19
 * Time: 12:08 PM
 */

class CR_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function add($data = array(), $approve_data = array())
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->insert('cr', $data);
        $cid = $this->db->insert_id();
        $approve_data['application_id'] = $cid;
        $this->db->insert('approve_details_others', $approve_data);
        $ref = date("CR-") . sprintf("%04d", $cid);
        $this->db->where('id', $cid);
        $this->db->update('cr', array('reference_no' => $ref));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;


    }

    public function getUsersByID($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getCRById($id)
    {
        $q = $this->db->get_where('cr', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getCompanyById($id)
    {
        $q = $this->db->get_where('company', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getDocTypeById($id)
    {
        $q = $this->db->get_where('doctype', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getApproversList($interface_name,$category_id,$company_id,$type) {
        if(empty($category_id)) $category_id=665;
        $this->db->where(array('interface_name' =>$interface_name,'status'=>0,'category_id'=>$category_id,'company_id'=>$company_id,'type'=>$type))->order_by('approver_seq','asc');
        $q = $this->db->get("approver_list_other");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getApproverDetails($id,$application_id,$category_id,$company_id,$type,$interface_name) {
        $this->db->select("*");
        $q = $this->db->get_where('approve_details_others', array('aprrover_id' =>$id,'category_id'=>$category_id, 'approve_status'=>1,'company_id'=>$company_id,'type'=>$type,'interface_name'=>$interface_name,'application_id' =>$application_id));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function updateCR($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('cr', $data)) {
            return true;
        }
        return false;
    }


    public function deleteCR($id)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->delete('cr', array('id' => $id));
        $this->db->delete('approve_details_others', array('application_id' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }


    public function getApproval($id)
    {
        $q = $this->db->get_where('approve_details_others', array('id' => $id, 'approve_status' => 0));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getNextApprovals($id, $table_name,$category_id,$company_id,$type)
    {
//        if($category_id) $this->db->get_where('category_id',$category_id);
        $q = $this->db->get_where('approver_list_other', array('approver_seq' => $id,  'category_id' => $category_id,'company_id' => $company_id,'type' => $type,'interface_name' =>  $table_name));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }



    public function updateStatus($approve_details_new, $approve_details_previous, $info_new, $id,$application_id,$table_name)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$application_id);
        $this->db->update($table_name, $info_new);
        $this->db->where('id',$id);
        $this->db->update('approve_details_others', $approve_details_previous);
        if($approve_details_new) $this->db->insert('approve_details_others',$approve_details_new);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;

    }

    public function updateStatusReject($approve_details_previous, $info_new, $id,$application_id,$table_name)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('id',$application_id);
        $this->db->update($table_name, $info_new);
        $this->db->where('id',$id);
        $this->db->update('approve_details_others', $approve_details_previous);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;

    }

    public function getApprovalBluk($id)
    {
        $q = $this->db->get_where('approve_details_others', array('application_id' => $id, 'approve_status' => 0));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function updateStatusChunk($approve_details_new, $approve_details_previous, $info_new,$table_name)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        if(!empty($approve_details_new)) $this->db->insert_batch('approve_details_others',$approve_details_new);
        if(!empty($info_new)){
            foreach ($info_new as $item)  $this->db->query($item);
        }
        if(!empty($approve_details_previous)){
            foreach ($approve_details_previous as $item_next)  $this->db->query($item_next);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;

    }

    public function updateCurrentStatus($inv, $cr_status, $status)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->update('cr', $status, array('id' => $inv));
        $this->db->insert('cr_status', $cr_status);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }
}