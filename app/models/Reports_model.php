<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getPOSSetting()
    {
        $q = $this->db->get('pos_settings');
        if ($q->num_rows() > 0) {
            return $q->row();
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


    public function getAllBillDetailsForCompany($company=NULL,$year=NULL,$month=NULL)
    {
        $this->db->select('bills.*,employees.id as ids,employees.name as nam,packages.name as p_name,designations.name as d_name,company.name as c_name')
            ->join('employees', 'employees.employee_id=bills.employee_id', 'left')
            ->join('company', 'employees.company_id=company.id', 'left')
            ->join('designations', 'employees.designation_id=designations.id', 'left')
            ->join('packages', 'packages.id=employees.package_id', 'left');

        if ($company) {
            $this->db->where('company.id', $company);
        }
        $q = $this->db->get_where('bills', array('year' => $year,'month' => $month,));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
    public function getCompanyByName($name)
    {
        $q = $this->db->get_where('company', array('id' => $name), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getAllBillSummaryForCompany($year=NULL,$month=NULL)
    {
        $query = "SELECT sum(b.ceiling_amount) as camt,(round(sum(b.usage_amount),2)) as uamt, c.name as c_name  FROM sma_bills as b inner join sma_employees as e INNER join sma_company as c on b.employee_id=e.employee_id and e.company_id=c.id where b.month='".$month."' and b.year='".$year."' GROUP by c.id";
        $q = $this->db->query($query);
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
}
