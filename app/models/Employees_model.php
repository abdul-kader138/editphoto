<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 12-Jun-18
 * Time: 1:15 PM
 */

class Employees_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBillerCompanies()
    {
        $q = $this->db->get_where('companies', array('group_name' => 'biller'));
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

    public function addEmployee($data = array())
    {
        if ($this->db->insert('employees', $data)) {
            $cid = $this->db->insert_id();
            return $cid;
        }
        return false;
    }

    public function updateEmployee($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('employees', $data)) {
            return true;
        }
        return false;
    }

    public function getEmployeeById($id)
    {
        $q = $this->db->get_where('employees', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function deleteEmployee($id)
    {
        if ($this->db->delete('employees', array('id' => $id))) return true;
        else return FALSE;
    }

    public function getDesignationByCode($id)
    {
        $q = $this->db->get_where('designations', array('code' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function addEmployees($data)
    {
        if ($this->db->insert_batch('employees', $data)) {
            return true;
        }
        return false;
    }

    public function getEmployeeByMobile($id, $number)
    {
        $q = $this->db->get_where('employees', array('mobile_number' => $number), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getBillByMonthAndYear($month, $year, $operator_id, $package_id)
    {
        $q = $this->db->get_where('bills', array('month' => $month, 'year' => $year, 'operator_id' => $operator_id, 'package_id' => $package_id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addBills($data)
    {
        if ($this->db->insert_batch('bills', $data)) {
            return true;
        }
        return false;
    }

    public function deleteBill($id)
    {
        if ($this->db->delete('bills', array('reference_no' => $id))) return true;
        else return FALSE;
    }


    public function getAllBillDetails($ref)
    {
        $this->db->select('bills.*,employees.name as nam,employees.designation_id,packages.name as p_name,designations.name as d_name')
            ->join('employees', 'employees.employee_id=bills.employee_id', 'left')
            ->join('packages', 'packages.id=employees.package_id', 'left')
            ->join('designations', 'designations.id=employees.designation_id', 'left');
        $q = $this->db->get_where('bills', array('reference_no' => $ref));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getOperatorByID($id)
    {
        $q = $this->db->get_where('operators', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getALlEmployeeDetails($id)
    {
        $this->db->select('employees.*,company.name as c_name, operators.name as o_name, packages.name as p_name,designations.name as d_name')
            ->join('company', 'employees.company_id=company.id', 'left')
            ->join('operators', 'employees.operator_id=operators.id', 'left')
            ->join('packages', 'employees.package_id=packages.id', 'left')
            ->join('designations', 'employees.designation_id=designations.id', 'left')
            ->group_by('employees.id')
            ->order_by('id', 'asc');

        $q = $this->db->get_where('employees', array('employees.id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;

    }

    public function getAllBillDetailsForUpload($ref)
    {
        $this->db->select('bills.*,employees.name as nam,packages.name as p_name')
            ->join('employees', 'employees.employee_id=bills.employee_id', 'left')
            ->join('packages', 'packages.id=employees.package_id', 'left')
            ->like('bills.employee_id', 'PG', 'after');
        $q = $this->db->get_where('bills', array('reference_no' => $ref));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllBillDetailsForUploadAll($ref)
    {
        $this->db->select('bills.*,employees.id as ids,employees.name as nam,packages.name as p_name,designations.name as d_name,company.name as c_name')
            ->join('employees', 'employees.employee_id=bills.employee_id', 'left')
            ->join('company', 'employees.company_id=company.id', 'left')
            ->join('designations', 'employees.designation_id=designations.id', 'left')
            ->join('packages', 'packages.id=employees.package_id', 'left');
        $q = $this->db->get_where('bills', array('reference_no' => $ref));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function getAllEmployees()
    {
        $q = $this->db->get("employees");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    public function addEmployeePayment($data = array())
    {
        if ($this->db->insert('employees_payment', $data)) {
            $cid = $this->db->insert_id();
            return $cid;
        }
        return false;
    }

    public function getEmployeePaymentById($id)
    {
        $q = $this->db->get_where('employees_payment', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updateEmployeePayment($id, $data = array())
    {
        $this->db->where('id', $id);
        if ($this->db->update('employees_payment', $data)) {
            return true;
        }
        return false;
    }

    public function deletePayment($id)
    {
        if ($this->db->delete('employees_payment', array('id' => $id))) return true;
        else return FALSE;
    }

    public function getEmployeePaymentsById($id)
    {

        $this->db->select("employees_payment.*,employees.employee_id,employees.name as nam,company.name as c_name");
        $this->db->from('employees_payment');
        $this->db->where('employees_payment.id', $id);
        $this->db->join('employees', 'employees.employee_id=employees_payment.employee_id', 'left');
        $this->db->join('company', 'company.id=employees.company_id', 'left');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;

    }

    public function getSalaryByMonthAndYear($month, $year,$employee_id)
    {
        $q = $this->db->get_where('salary', array('month' => $month, 'year' => $year,'employee_id'=>$employee_id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getPaymentById($id)
    {
        $q = $this->db->get_where('employees_payment', array('employee_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addSalary($data)
    {
        if ($this->db->insert_batch('salary', $data)) {
            return true;
        }
        return false;
    }

    public function getAllSalaryDetails($ref)
    {
        $this->db->select("salary.*,employees_payment.employee_id,employees.employee_id,employees.name as nam,company.name as c_name");
        $this->db->from('salary');
        $this->db->where('salary.reference_no', $ref);
        $this->db->join('employees_payment', 'employees_payment.employee_id=salary.employee_id', 'left');
        $this->db->join('employees', 'employees.employee_id=employees_payment.employee_id', 'left');
        $this->db->join('company', 'company.id=employees.company_id', 'left');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function deleteSalary($id)
    {
        if ($this->db->delete('salary', array('reference_no' => $id))) return true;
        else return FALSE;
    }


}