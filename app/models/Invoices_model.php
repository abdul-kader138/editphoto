<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 28-Jul-19
 * Time: 11:13 AM
 */

class Invoices_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }


    public function getServiceType()
    {
        $this->db->select("id, name");
        $q = $this->db->get('service_type');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getComplexityType()
    {
        $this->db->select("id, name,price");
        $q = $this->db->get('complexity_type');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAddOnsType()
    {
        $this->db->select("id, name,price");
        $q = $this->db->get('add_ons');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
    public function getDeliveryFormatType()
    {
        $this->db->select("id, name");
        $q = $this->db->get('delivery_format');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getDeliveryCostType()
    {
        $this->db->select("id, name,price");
        $q = $this->db->get('delivery_time_cost');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getDocumentById($id)
    {
        $q = $this->db->get_where('documents', array('reference_no' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function invoiceBatch($data)
    {

        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        if(!empty($data)) $this->db->insert_batch('invoices',$data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        return true;
    }

    public function getInvoicesById($id)
    {
        $this->db->select($this->db->dbprefix('invoices') . '.*, ' . $this->db->dbprefix('invoices') . '.reference_no as rname');
        $q = $this->db->get_where('invoices', array('invoices.reference_no' => $id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function delete($id)
    {
        if ($this->db->delete('invoices', array('reference_no' => $id)))  return true;
        else return FALSE;
    }

    public function updateStatus($id, $payment_status, $note)
    {
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->where('reference_no',$id);
        $this->db->update('invoices', array('payment_status'=>$payment_status,'payment_note'=>$note));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) return false;
        else return true;
    }
}