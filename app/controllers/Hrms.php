<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hrms extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->permission_details = $this->site->checkPermissions();
        $this->lang->load('billers', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->model('hr_model');
        $this->load->model('auth_model');
    }


    function manpower_requisition()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-manpower_requisition'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('HR')));
        $meta = array('page_title' => lang('HR'), 'bc' => $bc);
        $this->page_construct('hr/manpower_requisition', $meta, $this->data);
    }

    function getMR()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-manpower_requisition'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $current_users = $this->hr_model->getUsersByID($this->session->userdata('user_id'));

        $edit_link = "";
        $delete_link = "";
        if ($get_permission['hrms-edit_manpower_requisition'] || $this->Owner || $this->Admin) $edit_link = anchor('hrms/edit_manpower_requisition/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'class="sledit"');
        if ($get_permission['hrms-delete_manpower_requisition'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('hrms/delete_manpower_requisition/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete') . "</a>";
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $edit_link . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('manpower_requisition') . ".id as id, " . $this->db->dbprefix('manpower_requisition') . ".requisition_date," . $this->db->dbprefix('designations') . ".name as nam," . $this->db->dbprefix('manpower_requisition') . ".workstation as ref," . $this->db->dbprefix('manpower_requisition') . ".department," . $this->db->dbprefix('company') . ".name as d_name," . $this->db->dbprefix('manpower_requisition') . ".organization_type," . $this->db->dbprefix('manpower_requisition') . ".number_required," . $this->db->dbprefix('manpower_requisition') . ".status")
            ->from("manpower_requisition")
            ->join('company', 'manpower_requisition.company_id=company.id', 'left')
            ->join('designations', 'manpower_requisition.designation_id=designations.id', 'left')
            ->group_by('manpower_requisition.id');
        if (!$this->Owner && !$this->Admin && $current_users->view_right == '0') {
            $this->datatables->where('manpower_requisition.created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function add_manpower_requisition()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-add_manpower_requisition'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Manpower Requisition";
        $this->form_validation->set_rules('workstation', lang("workstation"), 'trim|required');
        $this->form_validation->set_rules('requisition_date', lang("requisition_date"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('department', lang("department"), 'trim|required');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('category_id', lang("category_id"), 'trim|required');
        $this->form_validation->set_rules('position', lang("position"), 'trim|required');
        $this->form_validation->set_rules('organization_type', lang("organization_type"), 'trim|required');
        $this->form_validation->set_rules('number_required', lang("number_required"), 'trim|required|numeric');
        $this->form_validation->set_rules('exp_min', lang("exp_min"), 'trim|required|numeric');
        $this->form_validation->set_rules('exp_max', lang("exp_max"), 'trim|required|numeric');
        $this->form_validation->set_rules('age_min', lang("age_min"), 'trim|required|numeric');
        $this->form_validation->set_rules('age_max', lang("age_max"), 'trim|required|numeric');
        $this->form_validation->set_rules('mb_year', lang("mb_year"), 'trim|required');
        $this->form_validation->set_rules('gender', lang("gender"), 'trim|required');
//        $this->form_validation->set_rules('requisition_reason', lang("requisition_reason"), 'trim');
        $this->form_validation->set_rules('education', lang("education"), 'trim|required');
        $this->form_validation->set_rules('skill', lang("skill"), 'trim|required');
        $this->form_validation->set_rules('nature_experience', lang("nature_experience"), 'trim|required');
        $this->form_validation->set_rules('areas_of_responsibility', lang("areas_of_responsibility"), 'trim|required');
        $this->form_validation->set_rules('reporting_to', lang("reporting_to"), 'trim|required');
        $this->form_validation->set_rules('no_of_reportees', lang("no_of_reportees"), 'trim|required|numeric');
        if ($this->form_validation->run() == true) {
            $userLists = $this->site->getAllUser();
//            $approver_details = $this->site->getApproverList('add_manpower_requisition');
            $approver_details = $this->site->getApproverListByCategory('add_manpower_requisition',$this->input->post('category_id'));
            $reason = $this->input->post('requirement');
            $user_details = $this->getApproveCustomer($userLists, $approver_details->approver_id);
            $approve_data = array(
                'aprrover_id' => $approver_details->approver_id,
                'status' => 'Waiting For Approval-' . $user_details->username,
                'table_name' => 'manpower_requisition',
                'approver_seq' => $approver_details->approver_seq,
                'approver_seq_name' => $approver_details->approver_seq_name,
                'created_by' => $this->session->userdata('user_id'),
                'interface_name' => $approver_details->interface_name,
                'next_approve_seq' => $approver_details->approver_next_seq,
                'category_id' => $this->input->post('category_id'),
                'created_date' => date("Y-m-d H:i:s")
            );

            $data = array(
                'workstation' => $this->input->post('workstation'),
                'requisition_date' => $this->sma->fld($this->input->post('requisition_date')),
                'company_id' => $this->input->post('company_id'),
                'department' => $this->input->post('department'),
                'designation_id' => $this->input->post('designation_id'),
                'position' => $this->input->post('position'),
                'organization_type' => $this->input->post('organization_type'),
                'corporate_name' => $this->input->post('corporate_name'),
                'business_name' => $this->input->post('business_name'),
                'number_required' => $this->input->post('number_required'),
                'exp_min' => $this->input->post('exp_min'),
                'exp_max' => $this->input->post('exp_max'),
                'age_min' => $this->input->post('age_min'),
                'age_max' => $this->input->post('age_max'),
                'ap' => (($reason == 'ap') ? 1 : 0),
                'rr' => (($reason == 'rr') ? 1 : 0),
                'rt' => (($reason == 'rt') ? 1 : 0),
                'rp' => (($reason == 'rp') ? 1 : 0),
                'rtr' => (($reason == 'rtr') ? 1 : 0),
                'mb_year' => $this->input->post('mb_year'),
                'reason_ap' => $this->input->post('reason_ap'),
                'time_limit' => $this->input->post('time_limit'),
                'education' => $this->input->post('education'),
                'skill' => $this->input->post('skill'),
                'nature_experience' => $this->input->post('nature_experience'),
                'areas_of_responsibility' => $this->input->post('areas_of_responsibility'),
                'reporting_to' => $this->input->post('reporting_to'),
                'no_of_reportees' => $this->input->post('no_of_reportees'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s"),
                'status' => 'Waiting For Approval-' . $user_details->username,
                'next_approve_seq' => $approver_details->approver_next_seq,
                'other_info' => $this->input->post('other_info'),
                'gender' => $this->input->post('gender'),
                'category_id' => $this->input->post('category_id')
//                'requisition_reason' => $this->input->post('requisition_reason')
            );
        }

        if ($this->form_validation->run() == true && $this->hr_model->addMR($data, $approve_data)) {
//            $this->sendMail($data);
            $this->session->set_flashdata('message', "Information Successfully added.");
            redirect("hrms/manpower_requisition");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['companies'] = $this->site->getAllCompany();
            $this->data['categories'] = $this->site->getAllCategories();
            $this->data['designations'] = $this->site->getAllDesignation();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('hrms'), 'page' => lang('HR')), array('link' => '#', 'page' => lang('Add_Manpower_Requisition')));
            $meta = array('page_title' => lang('Add_Manpower_Requisition'), 'bc' => $bc);
            $this->page_construct('hr/add_manpower_requisition', $meta, $this->data);
        }
    }


    function edit_manpower_requisition($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-edit_manpower_requisition'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $info = $this->hr_model->getMRById($id);
        if ($info->approved == '1') {
            $this->session->set_flashdata('warning', lang('Edit not possible,data already approved'));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['title'] = "Edit Manpower Requisition";
        $this->form_validation->set_rules('workstation', lang("workstation"), 'trim|required');
        $this->form_validation->set_rules('requisition_date', lang("requisition_date"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('department', lang("department"), 'trim|required');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('position', lang("position"), 'trim|required');
        $this->form_validation->set_rules('organization_type', lang("organization_type"), 'trim|required');
        $this->form_validation->set_rules('number_required', lang("number_required"), 'trim|required|numeric');
        $this->form_validation->set_rules('exp_min', lang("exp_min"), 'trim|required|numeric');
        $this->form_validation->set_rules('exp_max', lang("exp_max"), 'trim|required|numeric');
        $this->form_validation->set_rules('age_min', lang("age_min"), 'trim|required|numeric');
        $this->form_validation->set_rules('age_max', lang("age_max"), 'trim|required|numeric');
        $this->form_validation->set_rules('mb_year', lang("mb_year"), 'trim|required');
        $this->form_validation->set_rules('education', lang("education"), 'trim|required');
        $this->form_validation->set_rules('gender', lang("gender"), 'trim|required');
//        $this->form_validation->set_rules('requisition_reason', lang("gender"), 'trim');
        $this->form_validation->set_rules('skill', lang("skill"), 'trim|required');
        $this->form_validation->set_rules('nature_experience', lang("nature_experience"), 'trim|required');
        $this->form_validation->set_rules('areas_of_responsibility', lang("areas_of_responsibility"), 'trim|required');
        $this->form_validation->set_rules('reporting_to', lang("reporting_to"), 'trim|required');
        $this->form_validation->set_rules('no_of_reportees', lang("no_of_reportees"), 'trim|required|numeric');

        if ($this->form_validation->run() == true) {
            $reason = $this->input->post('requirement');
            $reason1 = $this->input->post('requirement');
            $data = array(
                'workstation' => $this->input->post('workstation'),
                'requisition_date' => $this->sma->fld($this->input->post('requisition_date')),
                'company_id' => $this->input->post('company_id'),
                'department' => $this->input->post('department'),
                'designation_id' => $this->input->post('designation_id'),
                'position' => $this->input->post('position'),
                'organization_type' => $this->input->post('organization_type'),
                'corporate_name' => $this->input->post('corporate_name'),
                'business_name' => $this->input->post('business_name'),
                'number_required' => $this->input->post('number_required'),
                'exp_min' => $this->input->post('exp_min'),
                'exp_max' => $this->input->post('exp_max'),
                'age_min' => $this->input->post('age_min'),
                'age_max' => $this->input->post('age_max'),
                'ap' => (($reason == 'ap') ? 1 : 0),
                'rr' => (($reason == 'rr') ? 1 : 0),
                'rt' => (($reason == 'rt') ? 1 : 0),
                'rp' => (($reason == 'rp') ? 1 : 0),
                'rtr' => (($reason == 'rtr') ? 1 : 0),
                'mb_year' => $this->input->post('mb_year'),
                'reason_ap' => $this->input->post('reason_ap'),
                'time_limit' => $this->input->post('time_limit'),
                'education' => $this->input->post('education'),
                'skill' => $this->input->post('skill'),
                'nature_experience' => $this->input->post('nature_experience'),
                'areas_of_responsibility' => $this->input->post('areas_of_responsibility'),
                'reporting_to' => $this->input->post('reporting_to'),
                'no_of_reportees' => $this->input->post('no_of_reportees'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
                'gender' => $this->input->post('gender')
//                'requisition_reason' => $this->input->post('requisition_reason')
            );
        }

        if ($this->form_validation->run() === TRUE && $this->hr_model->updateMR($id, $data)) {
            $this->session->set_flashdata('message', "Information Successfully updated.");
            redirect("hrms/manpower_requisition");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['document'] = $this->hr_model->getMRById($id);
            $this->data['companies'] = $this->site->getAllCompany();
            $this->data['designations'] = $this->site->getAllDesignation();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('hrms'), 'page' => lang('HR')), array('link' => '#', 'page' => lang('Edit_Manpower_Requisition')));
            $meta = array('page_title' => lang('Edit_Manpower_Requisition'), 'bc' => $bc);
            $this->page_construct('hr/edit_manpower_requisition', $meta, $this->data);
        }
    }

    function delete_manpower_requisition($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-delete_manpower_requisition'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->hr_model->deleteMR($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("Information Successfully deleted.");
                die();
            }
            $this->session->set_flashdata('message', lang('doc_mov_deleted'));
            redirect('hrms/manpower_requisition');
        }
    }

    function modal_manpower_requisition($id = NULL)
    {
        $this->sma->checkPermissions('manpower_requisition', TRUE);

        $pr_details = $this->hr_model->getMRById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }


        $this->data['document'] = $pr_details;
        $this->data['companies'] = $this->hr_model->getCompanyById($pr_details->company_id);
        $this->data['designations'] = $this->hr_model->getDesignationById($pr_details->designation_id);
        $approversList = $this->hr_model->getApproversList('add_manpower_requisition',$pr_details->category_id);
        $approversListDetails = $this->bulidApproverHistory($approversList, $pr_details->id, $pr_details->created_by,$pr_details->created_date);
        $this->data['footer'] = $approversListDetails;
        $this->load->view($this->theme . 'hr/modal_manpower_requisition', $this->data);
    }

    function getApproveCustomer($userList, $approveId)
    {
        $userDetails = null;
        foreach ($userList as $user) {
            if ($approveId == $user->id) {
                $userDetails = $user;
                break;
            }
        }
        return $userDetails;
    }

    function pdf($id = NULL, $view = NULL)
    {
        $this->sma->checkPermissions('manpower_requisition', TRUE);

        $mr_details = $this->hr_model->getMRById($id);
        if (!$id || !$mr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }

        $approversList = $this->hr_model->getApproversList('add_manpower_requisition',$mr_details->category_id);
        $approversListDetails = $this->bulidApproverHistory($approversList, $mr_details->id, $mr_details->created_by);
        $name = "Manpower_Requisition_" . $mr_details->name . ".pdf";
        $this->data['document'] = $mr_details;
        $this->data['companies'] = $this->hr_model->getCompanyById($mr_details->company_id);
        $this->data['designations'] = $this->hr_model->getDesignationById($mr_details->designation_id);
        $this->data['footer'] = $approversListDetails;
        if ($view) {
            $this->load->view($this->theme . 'hr/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'hr/pdf', $this->data, TRUE);
            $this->sma->generate_pdf($html, $name);
        }
    }


    function bulidApproverHistory($approver_list, $application_id, $created_id,$created_date=null)
    {
        $infoArray = array();
        $created_history_c = $this->hr_model->getUsersByID($created_id);
        $user_info = array(
            'approver_type' => 'Created By',
            'created_date' => $created_date,
            'username' => $created_history_c->first_name . " " . $created_history_c->last_name
        );
        $infoArray[] = $user_info;
        foreach ($approver_list as $approver) {
            $username = "";
            $approver_details = $this->hr_model->getApproverDetails($approver->approver_id, $application_id,$approver->category_id,$approver->interface_name);

            if ($approver_details) {
                $created_history = $this->hr_model->getUsersByID($approver_details->aprrover_id);
                $username = $created_history->first_name . " " . $created_history->last_name;
                $created_date = $approver_details->updated_date;
            }else{
                $created_history=null;
                $username=null;
                $created_date = null;
            }
            $info = array(
                'approver_type' => $approver->approver_seq_name,
                'created_date'=>$created_date,
                'username' => $username
            );
            $infoArray[] = $info;
        }
        return $infoArray;
    }

    public function add_recruitment_approval()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-add_recruitment_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Recruitment Approval";
        $this->form_validation->set_rules('workstation', lang("workstation"), 'trim|required');
        $this->form_validation->set_rules('date_of_interview', lang("date_of_interview"), 'trim|required');
        $this->form_validation->set_rules('date_of_join', lang("date_of_join"), 'trim|required');
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('emp_id', lang("emp_id"), 'trim|required');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('salary', lang("salary"), 'trim|required|numeric');
        $this->form_validation->set_rules('division', lang("division"), 'trim|required');
        $this->form_validation->set_rules('department', lang("department"), 'trim|required');
        $this->form_validation->set_rules('gender', lang("gender"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
//        $this->form_validation->set_rules('category_id', lang("category_id"), 'trim|required');
        if ($this->form_validation->run() == true) {
            $userLists = $this->site->getAllUser();
            $approver_details = $this->site->getApproverList('add_recruitment_approval');
            $user_details = $this->getApproveCustomer($userLists, $approver_details->approver_id);
            $approve_data = array(
                'aprrover_id' => $approver_details->approver_id,
                'status' => 'Waiting For Approval-' . $user_details->username,
                'table_name' => 'recruitment_approval',
                'approver_seq' => $approver_details->approver_seq,
                'category_id' =>  665,
                'approver_seq_name' => $approver_details->approver_seq_name,
                'created_by' => $this->session->userdata('user_id'),
                'interface_name' => $approver_details->interface_name,
                'next_approve_seq' => $approver_details->approver_next_seq,
                'created_date' => date("Y-m-d H:i:s")
            );

            $data = array(
                'workstation' => $this->input->post('workstation'),
                'date_of_interview' => $this->sma->fld($this->input->post('date_of_interview')),
                'date_of_join' => $this->sma->fld($this->input->post('date_of_join')),
                'name' => $this->input->post('name'),
                'company_id' => $this->input->post('company_id'),
                'emp_id' => $this->input->post('emp_id'),
                'designation_id' => $this->input->post('designation_id'),
                'category_id' =>  665,
                'salary' => $this->input->post('salary'),
                'division' => $this->input->post('division'),
                'department' => $this->input->post('department'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s"),
                'status' => 'Waiting For Approval-' . $user_details->username,
                'next_approve_seq' => $approver_details->approver_next_seq,
                'other_info' => $this->input->post('other_info'),
                'gender' => $this->input->post('gender')
            );
        }

        if ($this->form_validation->run() == true && $this->hr_model->addRA($data, $approve_data)) {
            $this->session->set_flashdata('message', "Information Successfully added.");
            redirect("hrms/recruitment_approval");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['companies'] = $this->site->getAllCompany();
            $this->data['designations'] = $this->site->getAllDesignation();
//            $this->data['categories'] = $this->site->getAllCategories();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('hrms'), 'page' => lang('HR')), array('link' => '#', 'page' => lang('Add_Recruitment_Approval')));
            $meta = array('page_title' => lang('Add_Manpower_Requisition'), 'bc' => $bc);
            $this->page_construct('hr/add_recruitment_approval', $meta, $this->data);
        }
    }

    function recruitment_approval()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-recruitment_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('HR')));
        $meta = array('page_title' => lang('HR'), 'bc' => $bc);
        $this->page_construct('hr/recruitment_approval', $meta, $this->data);
    }

    function getRA()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-recruitment_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $current_users = $this->hr_model->getUsersByID($this->session->userdata('user_id'));

        $edit_link = "";
        $delete_link = "";
        if ($get_permission['hrms-edit_recruitment_approval'] || $this->Owner || $this->Admin) $edit_link = anchor('hrms/edit_recruitment_approval/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'class="sledit"');
        if ($get_permission['hrms-delete_recruitment_approval'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('hrms/delete_recruitment_approval/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete') . "</a>";
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $edit_link . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('recruitment_approval') . ".id as id, " . $this->db->dbprefix('recruitment_approval') . ".emp_id," . $this->db->dbprefix('recruitment_approval') . ".name as ref," . $this->db->dbprefix('designations') . ".name," . $this->db->dbprefix('recruitment_approval') . ".workstation as d_name," . $this->db->dbprefix('recruitment_approval') . ".division," . $this->db->dbprefix('recruitment_approval') . ".date_of_interview," . $this->db->dbprefix('recruitment_approval') . ".date_of_join,date_of_interview," . $this->db->dbprefix('recruitment_approval') . ".status")
            ->from("recruitment_approval")
            ->join('designations', 'recruitment_approval.designation_id=designations.id', 'left')
            ->group_by('recruitment_approval.id');
        if (!$this->Owner && !$this->Admin && $current_users->view_right == '0') {
            $this->datatables->where('recruitment_approval.created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    function modal_recruitment_approval($id = NULL)
    {
        $this->sma->checkPermissions('recruitment_approval', TRUE);

        $pr_details = $this->hr_model->getRAById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }
        $this->data['document'] = $pr_details;
        $this->data['designations'] = $this->hr_model->getDesignationById($pr_details->designation_id);
        $this->data['companies'] = $this->hr_model->getCompanyById($pr_details->company_id);
        $this->load->view($this->theme . 'hr/modal_recruitment_approval', $this->data);
    }

    function pdf_recruitment_approval($id = NULL, $view = NULL)
    {
        $this->sma->checkPermissions('recruitment_approval', TRUE);

        $mr_details = $this->hr_model->getRAById($id);
        if (!$id || !$mr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }

        $approversList = $this->hr_model->getApproversList('add_recruitment_approval');
        $approversListDetails = $this->bulidApproverHistory($approversList, $mr_details->id, $mr_details->created_by,$approver->category_id,$approver->interface_name);
        $name = "Recruitment_Approval_" . $mr_details->name . ".pdf";
        $this->data['document'] = $mr_details;
        $this->data['designations'] = $this->hr_model->getDesignationById($mr_details->designation_id);
        $this->data['companies'] = $this->hr_model->getCompanyById($mr_details->company_id);
        $this->data['footer'] = $approversListDetails;
        if ($view) {
            $this->load->view($this->theme . 'hr/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'hr/pdf_recruitment_approval', $this->data, TRUE);
            $this->sma->generate_pdf($html, $name);
        }
    }

    function edit_recruitment_approval($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-edit_recruitment_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $info = $this->hr_model->getRAById($id);
        if ($info->approved == '1') {
            $this->session->set_flashdata('warning', lang('Edit not possible,data already approved'));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['title'] = "Edit Recruitment Approval";
        $this->data['title'] = "Add Recruitment Approval";
        $this->form_validation->set_rules('workstation', lang("workstation"), 'trim|required');
        $this->form_validation->set_rules('date_of_interview', lang("date_of_interview"), 'trim|required');
        $this->form_validation->set_rules('date_of_join', lang("date_of_join"), 'trim|required');
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('emp_id', lang("emp_id"), 'trim|required');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('department', lang("department"), 'trim|required');
        $this->form_validation->set_rules('salary', lang("salary"), 'trim|required|numeric');
        $this->form_validation->set_rules('division', lang("division"), 'trim|required');
        $this->form_validation->set_rules('gender', lang("gender"), 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'workstation' => $this->input->post('workstation'),
                'date_of_interview' => $this->sma->fld($this->input->post('date_of_interview')),
                'date_of_join' => $this->sma->fld($this->input->post('date_of_join')),
                'name' => $this->input->post('name'),
                'company_id' => $this->input->post('company_id'),
                'emp_id' => $this->input->post('emp_id'),
                'designation_id' => $this->input->post('designation_id'),
                'salary' => $this->input->post('salary'),
                'division' => $this->input->post('division'),
                'department' => $this->input->post('department'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
                'gender' => $this->input->post('gender')
            );
        }

        if ($this->form_validation->run() === TRUE && $this->hr_model->updateRA($id, $data)) {
            $this->session->set_flashdata('message', "Information Successfully updated.");
            redirect("hrms/recruitment_approval");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['document'] = $this->hr_model->getRAById($id);
            $this->data['designations'] = $this->site->getAllDesignation();
            $this->data['companies'] = $this->site->getAllCompany();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('hrms'), 'page' => lang('HR')), array('link' => '#', 'page' => lang('Edit_Recruitment_Approval')));
            $meta = array('page_title' => lang('Edit_Manpower_Requisition'), 'bc' => $bc);
            $this->page_construct('hr/edit_recruitment_approval', $meta, $this->data);
        }
    }

    function delete_recruitment_approval($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['hrms-delete_recruitment_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->hr_model->deleteRA($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("Information Successfully deleted.");
                die();
            }
            $this->session->set_flashdata('message', lang('doc_mov_deleted'));
            redirect('hrms/recruitment_approval');
        }
    }


    function hrms_actions()
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'export_excel') {
                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle('Manpower_Requisition');
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('Requisition_date'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('Position'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('Corporate/Business'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('Company_Name'));
                    $this->excel->getActiveSheet()->SetCellValue('E1', lang('Business_Name'));
                    $this->excel->getActiveSheet()->SetCellValue('F1', lang('Department'));
                    $this->excel->getActiveSheet()->SetCellValue('G1', lang('Company'));
                    $this->excel->getActiveSheet()->SetCellValue('H1', lang('Workstation'));
                    $this->excel->getActiveSheet()->SetCellValue('I1', lang('Designation'));
                    $this->excel->getActiveSheet()->SetCellValue('J1', lang('Number_Required'));
                    $this->excel->getActiveSheet()->SetCellValue('K1', lang('Reporting_to'));
                    $this->excel->getActiveSheet()->SetCellValue('L1', lang('No_Of_Reportees'));
                    $this->excel->getActiveSheet()->SetCellValue('M1', lang('Requirement_Reason'));
                    $this->excel->getActiveSheet()->SetCellValue('N1', lang('Required_Experience_(Min Years)'));
                    $this->excel->getActiveSheet()->SetCellValue('O1', lang('Required_Experience_(Max Years)'));
                    $this->excel->getActiveSheet()->SetCellValue('P1', lang('Age_Limit_(Min Years)'));
                    $this->excel->getActiveSheet()->SetCellValue('Q1', lang('Age_Limit_(Max Years)'));
                    $this->excel->getActiveSheet()->SetCellValue('R1', lang('Approved_Manpower_Budget_&_Plan_Year'));
                    $this->excel->getActiveSheet()->SetCellValue('S1', lang('Reason_For_Additional_Position_Requisition'));
                    $this->excel->getActiveSheet()->SetCellValue('T1', lang('Time_Limit_For_Filling_Position'));
                    $this->excel->getActiveSheet()->SetCellValue('U1', lang('Status'));
                    $this->excel->getActiveSheet()->SetCellValue('V1', lang('Education'));
                    $this->excel->getActiveSheet()->SetCellValue('W1', lang('Skill'));
                    $this->excel->getActiveSheet()->SetCellValue('X1', lang('Nature_Of_Experience'));
                    $this->excel->getActiveSheet()->SetCellValue('Y1', lang('Area Of Responsibilities'));
                    $this->excel->getActiveSheet()->SetCellValue('Z1', lang('Other Information'));
//
                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $document = $this->hr_model->getMRById($id);
                        $designations = $this->hr_model->getDesignationById($document->designation_id);
                        $companies = $this->hr_model->getCompanyById($document->company_id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $this->sma->hrsd($document->requisition_date));
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $document->position);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $document->organization_type);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $document->corporate_name);
                        $this->excel->getActiveSheet()->SetCellValue('E' . $row, $document->business_name);
                        $this->excel->getActiveSheet()->SetCellValue('F' . $row, $document->department);
                        $this->excel->getActiveSheet()->SetCellValue('G' . $row, $companies->name);
                        $this->excel->getActiveSheet()->SetCellValue('H' . $row, $document->workstation);
                        $this->excel->getActiveSheet()->SetCellValue('I' . $row, $designations->name);
                        $this->excel->getActiveSheet()->SetCellValue('J' . $row, $document->number_required);
                        $this->excel->getActiveSheet()->SetCellValue('K' . $row, $document->reporting_to);
                        $this->excel->getActiveSheet()->SetCellValue('L' . $row, $document->no_of_reportees);
                        if ($document->ap == '1') $rr='Additional Position';
                        if ($document->rr == '1') $rr='Replacement Due To Resignation';
                        if ($document->rt == '1') $rr='Replacement Due To Termination';
                        if ($document->rp == '1') $rr='Replacement Due To Promotion';
                        if ($document->rtr == '1') $rr='Replacement Due To Transfer';
                        $this->excel->getActiveSheet()->SetCellValue('M' . $row, $rr);
                        $this->excel->getActiveSheet()->SetCellValue('N' . $row, $document->exp_min);
                        $this->excel->getActiveSheet()->SetCellValue('O' . $row, $document->exp_max);
                        $this->excel->getActiveSheet()->SetCellValue('P' . $row, $document->age_min);
                        $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $document->age_max);
                        $this->excel->getActiveSheet()->SetCellValue('R' . $row, $document->mb_year);
                        $this->excel->getActiveSheet()->SetCellValue('S' . $row, $document->reason_ap);
                        $this->excel->getActiveSheet()->SetCellValue('T' . $row, $document->time_limit);
                        $this->excel->getActiveSheet()->SetCellValue('U' . $row, $document->status);
                        $this->excel->getActiveSheet()->SetCellValue('V' . $row, $document->education);
                        $this->excel->getActiveSheet()->SetCellValue('W' . $row, $document->skill);
                        $this->excel->getActiveSheet()->SetCellValue('X' . $row, $document->nature_experience);
                        $this->excel->getActiveSheet()->SetCellValue('Y' . $row, $this->sma->decode_html($document->areas_of_responsibility));
                        $this->excel->getActiveSheet()->SetCellValue('Z' . $row, $this->sma->decode_html($document->other_info));
                        $row++;
                    }

                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'manpower_requisition_' . date('Y_m_d_H_i_s');
                    if ($this->input->post('form_action') == 'export_pdf') {
                        $styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
                        $this->excel->getDefaultStyle()->applyFromArray($styleArray);
                        $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                        require_once(APPPATH . "third_party" . DIRECTORY_SEPARATOR . "MPDF" . DIRECTORY_SEPARATOR . "mpdf.php");
                        $rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
                        $rendererLibrary = 'MPDF';
                        $rendererLibraryPath = APPPATH . 'third_party' . DIRECTORY_SEPARATOR . $rendererLibrary;
                        if (!PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
                            die('Please set the $rendererName: ' . $rendererName . ' and $rendererLibraryPath: ' . $rendererLibraryPath . ' values' .
                                PHP_EOL . ' as appropriate for your directory structure');
                        }

                        header('Content-Type: application/pdf');
                        header('Content-Disposition: attachment;filename="' . $filename . '.pdf"');
                        header('Cache-Control: max-age=0');

                        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'PDF');
                        return $objWriter->save('php://output');
                    }
                    if ($this->input->post('form_action') == 'export_excel') {
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
                        header('Cache-Control: max-age=0');
                        set_time_limit(120);
                        ini_set('memory_limit', '256M');
                        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                        ob_end_clean();
                        return $objWriter->save('php://output');
                    }

                    redirect($_SERVER["HTTP_REFERER"]);
                }
            } else {
                $this->session->set_flashdata('error', $this->lang->line("No_Employee_Selected."));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function hrms_recruitment_actions()
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'export_excel_recruitment') {
                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle('Manpower_Requisition');
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('Emp_Id'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('Name'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('Designation'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('Date_Of_Interview'));
                    $this->excel->getActiveSheet()->SetCellValue('E1', lang('Gender'));
                    $this->excel->getActiveSheet()->SetCellValue('F1', lang('Company'));
                    $this->excel->getActiveSheet()->SetCellValue('G1', lang('Division'));
                    $this->excel->getActiveSheet()->SetCellValue('H1', lang('Workstation'));
                    $this->excel->getActiveSheet()->SetCellValue('I1', lang('Salary'));
                    $this->excel->getActiveSheet()->SetCellValue('J1', lang('Date_Of_Joining'));
                    $this->excel->getActiveSheet()->SetCellValue('K1', lang('Status'));
                    $this->excel->getActiveSheet()->SetCellValue('L1', lang('Department'));
                    $this->excel->getActiveSheet()->SetCellValue('M1', lang('Other Information'));
//
                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $document = $this->hr_model->getRAById($id);
                        $designations = $this->hr_model->getDesignationById($document->designation_id);
                        $companies = $this->hr_model->getCompanyById($document->company_id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $document->emp_id);
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $document->name);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $designations->name);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->sma->hrsd($document->date_of_interview));
                        $this->excel->getActiveSheet()->SetCellValue('E' . $row, $document->gender);
                        $this->excel->getActiveSheet()->SetCellValue('F' . $row, $companies->name);
                        $this->excel->getActiveSheet()->SetCellValue('G' . $row, $document->division);
                        $this->excel->getActiveSheet()->SetCellValue('H' . $row, $document->workstation);
                        $this->excel->getActiveSheet()->SetCellValue('I' . $row, $document->salary);
                        $this->excel->getActiveSheet()->SetCellValue('J' . $row, $this->sma->hrsd($document->date_of_join));
                        $this->excel->getActiveSheet()->SetCellValue('K' . $row, $document->status);
                        $this->excel->getActiveSheet()->SetCellValue('L' . $row, $document->department);
                        $this->excel->getActiveSheet()->SetCellValue('M' . $row, $this->sma->decode_html($document->other_info));
                        $row++;
                    }

                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'recruitment_approval_' . date('Y_m_d_H_i_s');
                    if ($this->input->post('form_action') == 'export_pdf') {
                        $styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
                        $this->excel->getDefaultStyle()->applyFromArray($styleArray);
                        $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                        require_once(APPPATH . "third_party" . DIRECTORY_SEPARATOR . "MPDF" . DIRECTORY_SEPARATOR . "mpdf.php");
                        $rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
                        $rendererLibrary = 'MPDF';
                        $rendererLibraryPath = APPPATH . 'third_party' . DIRECTORY_SEPARATOR . $rendererLibrary;
                        if (!PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
                            die('Please set the $rendererName: ' . $rendererName . ' and $rendererLibraryPath: ' . $rendererLibraryPath . ' values' .
                                PHP_EOL . ' as appropriate for your directory structure');
                        }

                        header('Content-Type: application/pdf');
                        header('Content-Disposition: attachment;filename="' . $filename . '.pdf"');
                        header('Cache-Control: max-age=0');

                        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'PDF');
                        return $objWriter->save('php://output');
                    }
                    if ($this->input->post('form_action') == 'export_excel_recruitment') {
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
                        header('Cache-Control: max-age=0');
                        set_time_limit(120);
                        ini_set('memory_limit', '256M');
                        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                        ob_end_clean();
                        return $objWriter->save('php://output');
                    }

                    redirect($_SERVER["HTTP_REFERER"]);
                }
            } else {
                $this->session->set_flashdata('error', $this->lang->line("No_Employee_Selected."));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }


    function  sendMail($data){
        $this->load->library('parser');
        $parse_data = array(
            'position' => $data['position'],
            'requisition_date' => $data['requisition_date'],
            'created_by' => $data['created_by'],
            'site_link' => site_url(),
            'site_name' => $this->Settings->site_name,
            'logo' => '<img src="' . base_url() . 'assets/uploads/logos/' . $this->Settings->logo . '" alt="' . $this->Settings->site_name . '"/>'
        );

        $msg = file_get_contents('./themes/' . $this->theme . 'email_templates/manpower_requisition.html');
        $message = $this->parser->parse_string($msg, $parse_data);
        $subject = "Manpower Requisition Generated into System". ' - ' . $this->Settings->site_name;
        $this->sma->send_email('a.kader@paragon.com.bd', $subject, $message);

        if ($this->sma->send_email('a.kader@paragon.com.bd', $subject, $message)) {
            $this->auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));
            $this->set_message('Mail_Send_Successfully');
        }
    }

}
