<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 13-Jul-19
 * Time: 11:34 AM
 */

class Correction_request extends MY_Controller
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
        $this->load->model('cr_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/document';
        $this->upload_path_movement = 'assets/uploads/cr_document/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '5080';
        $this->data['logo'] = true;
        $this->load->library('form_validation');
        $this->load->model('document_model');
        $this->allowed_file_size_new = '20';
    }

    function index()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Correction_Request')));
        $meta = array('page_title' => lang('Correction_Request'), 'bc' => $bc);
        $this->page_construct('cr/index', $meta, $this->data);
    }

    function getCR()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $current_users = $this->cr_model->getUsersByID($this->session->userdata('user_id'));

        $edit_link = "";
        $update_status_link = "";
        $delete_link = "";
        if ($get_permission['correction_request-edit'] || $this->Owner || $this->Admin) $edit_link = anchor('correction_request/edit/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'class="sledit"');
        if ($get_permission['correction_request-status'] || $this->Owner || $this->Admin) $update_status_link = anchor('correction_request/current_status_update/$1', '<i class="fa fa-check-circle"></i> ' . lang('Status_Update'), 'data-toggle="modal" data-target="#myModal"');
        if ($get_permission['correction_request-delete'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('correction_request/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete') . "</a>";
        if ($edit_link || $update_status_link || $delete_link) {
            $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . lang('actions') . ' <span class="caret"></span></button>
                     
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $edit_link . '</li>
            <li>' . $update_status_link . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('cr') . ".id as ids, " . $this->db->dbprefix('cr') . ".reference_no," . $this->db->dbprefix('company') . ".name as cname," . $this->db->dbprefix('doctype') . ".name as dname," . $this->db->dbprefix('cr') . ".type as tname," . $this->db->dbprefix('cr') . ".name as c_name," . $this->db->dbprefix('cr') . ".description," . $this->db->dbprefix('cr') . ".status," . $this->db->dbprefix('cr') . ".update_status")
            ->from("cr")
            ->join('company', 'cr.company_id=company.id', 'left')
            ->join('doctype', 'cr.category_id=doctype.id', 'left')
            ->group_by('cr.id');
        if (!$this->Owner && !$this->Admin && $current_users->view_right == '0') {
            $this->datatables->where('cr.created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->add_column("Actions", $action, "ids");
        echo $this->datatables->generate();
    }


    public function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('type', lang("type"), 'trim|required');
        $this->form_validation->set_rules('category_id', lang("category_id"), 'trim|required');
        $this->form_validation->set_rules('description', lang("description"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $userLists = $this->site->getAllUser();
            $approver_details = $this->site->getApproverOthersList('Correction Request', $this->input->post('category_id'), $this->input->post('company_id'), $this->input->post('type'));
            $user_details = $this->getApproveCustomer($userLists, $approver_details->approver_id);

            if (!$approver_details) {
                $this->session->set_flashdata('warning', lang("Please_Set_The_Approval_Layer_First"));
                redirect("correction_request");
            }

            $doc_url = "";
            $approve_data = array(
                'aprrover_id' => $approver_details->approver_id,
                'status' => 'Waiting For Approval-' . $user_details->username,
                'table_name' => 'cr',
                'approver_seq' => $approver_details->approver_seq,
                'approver_seq_name' => $approver_details->approver_seq_name,
                'created_by' => $this->session->userdata('user_id'),
                'interface_name' => $approver_details->interface_name,
                'next_approve_seq' => $approver_details->approver_next_seq,
                'company_id' => $this->input->post('company_id'),
                'category_id' => $this->input->post('category_id'),
                'type' => $this->input->post('type'),
                'created_date' => date("Y-m-d H:i:s")
            );


            $data = array(
                'name' => $this->input->post('name'),
                'company_id' => $this->input->post('company_id'),
                'category_id' => $this->input->post('category_id'),
                'type' => $this->input->post('type'),
                'interface_name' => "Correction Request",
                'description' => $this->input->post('description'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s"),
                'status' => 'Waiting For Approval-' . $user_details->username,
                'next_approve_seq' => $approver_details->approver_next_seq,
            );

            if ($_FILES['document']['size'] > 0) {
                $this->load->library('upload');
                $config['upload_path'] = $this->upload_path_movement;
                $config['allowed_types'] = $this->digital_file_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = true;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('document')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect($_SERVER["HTTP_REFERER"]);
                }
                $doc_url = (($this->upload_path_movement) . "/" . ($photo = $this->upload->file_name));
                $data['doc_url'] = $doc_url;
                $data['attachment_name'] = $this->upload->file_name;

            }

        }

        if ($this->form_validation->run() == true && $this->cr_model->add($data, $approve_data)) {
            $this->session->set_flashdata('message', lang("Data_Saved_Successfully"));
            redirect("correction_request");

        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['doctype'] = $this->site->getAllDocType();
            $this->data['companies'] = $this->site->getAllCompany();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('correction_request'), 'page' => lang('Correction_Request')), array('link' => '#', 'page' => lang('add')));
            $meta = array('page_title' => lang('add_movement'), 'bc' => $bc);
            $this->page_construct('cr/add', $meta, $this->data);
        }
    }


    function edit($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            //$get_permission = $this->permission_details[0];
            //if ((!$get_permission['correction_request-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            //}
        }


        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $info = $this->cr_model->getCRById($id);
        if ($info->approved == '1') {
            $this->session->set_flashdata('warning', lang('Edit not possible,data already approved'));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['title'] = "Edit";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('description', lang("description"), 'trim|required');


        if ($this->form_validation->run() == true) {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d H:i:s"),
            );


            if ($_FILES['document']['size'] > 0) {
                $t = true;
                if ($info->attachment_name) {
                    $this->load->helper("file");
                    $t = unlink("./assets/uploads/cr_document/" . $info->attachment_name);
                }

                $this->load->library('upload');
                $config['upload_path'] = $this->upload_path_movement;
                $config['allowed_types'] = $this->digital_file_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = true;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('document')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect($_SERVER["HTTP_REFERER"]);
                }
                $doc_url = (($this->upload_path_movement) . ($photo = $this->upload->file_name));
                $data['doc_url'] = $doc_url;
                $data['attachment_name'] = $this->upload->file_name;

            }

        }

        if ($this->form_validation->run() === TRUE && $this->cr_model->updateCR($id, $data)) {
            $this->session->set_flashdata('message', "Information Successfully updated.");
            redirect("correction_request");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['document'] = $this->cr_model->getCRById($id);
            $this->data['doctype'] = $this->site->getAllDocType();
            $this->data['companies'] = $this->site->getAllCompany();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('correction_request'), 'page' => lang('Correction_Request')), array('link' => '#', 'page' => lang('Edit')));
            $meta = array('page_title' => lang('Edit'), 'bc' => $bc);
            $this->page_construct('cr/edit', $meta, $this->data);
        }
    }

    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }
        $info = $this->cr_model->getCRById($id);
        if ($this->cr_model->deleteCR($id)) {
            if ($info->attachment_name) {
                $this->load->helper("file");
                $delete_file = unlink("./assets/uploads/cr_document/" . $info->attachment_name);
            }
            if ($this->input->is_ajax_request()) {
                echo lang("Information Successfully deleted.");
                die();
            }
            $this->session->set_flashdata('message', "Information Successfully deleted.");
            redirect('correction_request');
        }
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

    function modal_cr($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $pr_details = $this->cr_model->getCRById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }


        $this->data['document'] = $pr_details;
        $this->data['companies'] = $this->cr_model->getCompanyById($pr_details->company_id);
        $this->data['dcotype'] = $this->cr_model->getDocTypeById($pr_details->category_id);
        $approversList = $this->cr_model->getApproversList('Correction Request', $pr_details->category_id, $pr_details->company_id, $pr_details->type);
        $approversListDetails = $this->bulidApproverHistory($approversList, $pr_details->id, $pr_details->created_by, $pr_details->created_date);
        $this->data['footer'] = $approversListDetails;
        $this->load->view($this->theme . 'cr/modal_cr', $this->data);
    }


    function pdf($id = NULL, $view = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $pr_details = $this->cr_model->getCRById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }
        $name = "correction_request_" . $pr_details->reference_no . ".pdf";
        $this->data['document'] = $pr_details;
        $this->data['companies'] = $this->cr_model->getCompanyById($pr_details->company_id);
        $this->data['dcotype'] = $this->cr_model->getDocTypeById($pr_details->category_id);
        $approversList = $this->cr_model->getApproversList('Correction Request', $pr_details->category_id, $pr_details->company_id, $pr_details->type);
        $approversListDetails = $this->bulidApproverHistory($approversList, $pr_details->id, $pr_details->created_by, $pr_details->created_date);
        $this->data['footer'] = $approversListDetails;

        if ($view) {
            $this->load->view($this->theme . 'cr/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'cr/pdf', $this->data, TRUE);
            $this->sma->generate_pdf($html, $name);
        }
    }

    function bulidApproverHistory($approver_list, $application_id, $created_id, $created_date = null)
    {
        $infoArray = array();
        $created_history_c = $this->cr_model->getUsersByID($created_id);
        $user_info = array(
            'approver_type' => 'Created By',
            'created_date' => $created_date,
            'username' => $created_history_c->first_name . " " . $created_history_c->last_name
        );
        $infoArray[] = $user_info;
        foreach ($approver_list as $approver) {
            $username = "";
            $approver_details = $this->cr_model->getApproverDetails($approver->approver_id, $application_id, $approver->category_id, $approver->company_id, $approver->type, $approver->interface_name);

            if ($approver_details) {
                $created_history = $this->cr_model->getUsersByID($approver_details->aprrover_id);
                $username = $created_history->first_name . " " . $created_history->last_name;
                $created_date = $approver_details->updated_date;
            } else {
                $created_history = null;
                $username = null;
                $created_date = null;
            }
            $info = array(
                'approver_type' => $approver->approver_seq_name,
                'created_date' => $created_date,
                'username' => $username
            );
            $infoArray[] = $info;
        }
        return $infoArray;
    }


    function approval_list($ids = null)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->post('id')) {
            $ids = $this->input->post('id');
        }

        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['id'] = $ids;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Approval')));
        $meta = array('page_title' => lang($ids), 'bc' => $bc);
        $this->page_construct('cr/approval_list', $meta, $this->data);
    }

    function getApproval($ids = null)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['correction_request_approval'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->post('id')) {
            $ids = $this->input->post('id');
        }

        $approve_link = "";
        if ($get_permission['correction_request_approval'] || $this->Owner || $this->Admin)
            $approve_link = '<div class="row_cr_approve_status" id="$2">&nbsp;&nbsp;<i class="fa fa-edit"></i> Approve</div>';
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $approve_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('approve_details_others') . ".application_id as id, " . $this->db->dbprefix('approve_details_others') . ".interface_name as inter," . $this->db->dbprefix('approve_details_others') . ".status as nam," . $this->db->dbprefix('approve_details_others') . ".approver_seq_name as ref,"
                . $this->db->dbprefix($ids) . ".reference_no as ref_n," . $this->db->dbprefix('company') . ".name as names," . $this->db->dbprefix('approve_details_others') . ".id as approves_id," . $this->db->dbprefix('approve_details_others') . ".created_date as cdate")
            ->from("approve_details_others")
            ->join($ids, $ids . '.id=approve_details_others.application_id', 'left')
            ->join('company', 'company.id=' . $ids . '.company_id', 'left')
            ->join('doctype', 'doctype.id=' . $ids . '.category_id', 'left')
            ->where('table_name', $ids)
            ->where('approve_details_others.approve_status', 0)
            ->where('approve_details_others.aprrover_id', $this->session->userdata('user_id'))
            ->group_by('approve_details_others.id')
            ->add_column("Actions", $action, "id,approves_id")
            ->unset_column('approves_id');
        echo $this->datatables->generate();
    }


    public function update_status($id = null)
    {

        $this->form_validation->set_rules('status', lang("status"), 'trim|required');
        $this->form_validation->set_rules('note', lang("note"), 'trim');
        if ($this->input->post('id')) {
            $ids = $this->input->post('id');
        }
        $info = $this->cr_model->getApproval($id);
        if ($this->form_validation->run() == true) {
            $status = $this->input->post('status');
            $note = $this->sma->clear_tags($this->input->post('note'));
        } elseif ($this->input->post('update')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'correction_request');
        }

        if ($this->form_validation->run() == true) {
            $approve_details_new = null;
            $approve_details_previous = null;
            $info_new = null;

            if ($this->input->post('status') == 'Completed') {
                $table_name = '';
                if ($info->interface_name == 'Correction Request') $table_name = 'cr';
                //        if ($this->form_validation->run() == true && $this->sales_model->updateStatus($id, $status, $note)) {
                $getNextApproval = $this->getNextApproval($info->next_approve_seq, $table_name, $info->created_by, $info->created_date, $info->application_id, $info->category_id, $info->company_id, $info->type, $info->interface_name);
                // update current approval details
                $previous_approve_data = array(
                    'approve_status' => 1,
                    'updated_by' => $this->session->userdata('user_id'),
                    'status' => 'Approved',
                    'updated_date' => date("Y-m-d H:i:s"),
                    'comments' => $note
                );
                // update requisition
                $info_update = array(
                    'updated_by' => $this->session->userdata('user_id'),
                    'category_id' => $info->category_id,
                    'updated_date' => date("Y-m-d H:i:s")

                );
                // close requisition
                $info_close = array(
                    'updated_by' => $this->session->userdata('user_id'),
                    'category_id' => $info->category_id,
                    'status' => 'Approved',
                    'approved' => 1,
                    'updated_date' => date("Y-m-d H:i:s")

                );
                $approve_details_previous = $previous_approve_data;        // update
                if ($getNextApproval) {
                    // if found next level
                    $approve_details_new = $getNextApproval['approve_data']; // insert
                    $info_update['status'] = $getNextApproval['status'];
                    $info_update['next_approve_seq'] = $approve_details_new['next_approve_seq'];
                    $info_update['category_id'] = $approve_details_new['category_id'];
                    $info_update['company_id'] = $approve_details_new['company_id'];
                    $info_update['type'] = $approve_details_new['type'];
                    $info_new = $info_update;                                       // update
                    $info_new['interface_name'] = $info->interface_name;
                    $info_new['status'] = $getNextApproval['approve_data']['status'];

                } else {
                    // if not fount next level
                    $approve_details_new = null;
                    $info_close['next_approve_seq'] = 0;
                    $info_close['status'] = 'Approved';
                    $info_new = $info_close;
                    $info_new['category_id'] = $info->category_id;
                    $info_new['company_id'] = $info->company_id;
                    $info_new['type'] = $info->type;
                }
            }
            if ($this->input->post('status') == 'Rejected') {
                $previous_approve_data = array(
                    'approve_status' => 1,
                    'next_approve_seq' => 0,
                    'updated_by' => $this->session->userdata('user_id'),
                    'status' => 'Rejected',
                    'category_id' => $info->category_id,
                    'updated_date' => date("Y-m-d H:i:s"),
                    'comments' => $note
                );

                $info_data = array(
                    'next_approve_seq' => 0,
                    'updated_by' => $this->session->userdata('user_id'),
                    'status' => 'Rejected',
                    'approved' => 1,
                    'category_id' => $info->category_id,
                    'company_id' => $info->company_id,
                    'type' => $info->type,
                    'updated_date' => date("Y-m-d H:i:s")
                );
            }
        }

        if ($this->input->post('status') == 'Completed') {
            if ($this->form_validation->run() == true && $this->cr_model->updateStatus($approve_details_new, $approve_details_previous, $info_new, $id, $info->application_id, $table_name)) {
                $this->session->set_flashdata('message', lang('status_updated'));
                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'correction_request/approval_list/' . $info->table_name);
            } else {
                $this->data['approve'] = $info;
                $this->data['id'] = $id;
                $this->data['modal_js'] = $this->site->modal_js();
                $this->load->view($this->theme . 'cr/update_status', $this->data);

            }
        } else {
            if ($this->form_validation->run() == true && $this->cr_model->updateStatusReject($previous_approve_data, $info_data, $id, $info->application_id, $info->table_name)) {
                $this->session->set_flashdata('message', lang('status_updated'));
                redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'correction_request/approval_list/' . $info->table_name);
            } else {
                $this->data['approve'] = $info;
                $this->data['id'] = $id;
                $this->data['modal_js'] = $this->site->modal_js();
                $this->load->view($this->theme . 'cr/update_status', $this->data);

            }
        }
    }

    function getNextApproval($next_id, $table_naame, $created_by, $created_date, $application_id, $category_id, $company_id, $type, $interface_name)
    {
        $userLists = $this->site->getAllUser();
        $info_details = $this->cr_model->getNextApprovals($next_id, $interface_name, $category_id, $company_id, $type);
        $user_details = $this->getApproveCustomer($userLists, $info_details->approver_id);
        $details = array();
        $approve_data = array(
            'aprrover_id' => $info_details->approver_id,
            'table_name' => $table_naame,
            'approver_seq' => $info_details->approver_seq,
            'approver_seq_name' => $info_details->approver_seq_name,
            'created_by' => $created_by,
            'category_id' => $info_details->category_id,
            'company_id' => $info_details->company_id,
            'type' => $info_details->type,
            'interface_name' => $info_details->interface_name,
            'next_approve_seq' => $info_details->approver_next_seq,
            'application_id' => $application_id,
            'created_date' => $created_date
        );


        if ($info_details && $user_details) {
            $details['approve_data'] = $approve_data;
            $details['approve_data']['status'] = 'Waiting For Approval-' . $user_details->username;
            return $details;
        };
        return false;

    }


    function approval_actions()
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        $approve_details_new = array();
        $approve_details_previous = array();
        if ($this->form_validation->run() == true) {
            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'chuk_approval') {
                    $previous_approve_data = array();
                    $query_info_close = array();
                    foreach ($_POST['val'] as $id) {
                        $info = $this->cr_model->getApprovalBluk($id);
                        $table_name = '';
                        if ($info->interface_name == 'Correction Request') $table_name = 'cr';
                        $getNextApproval = $this->getNextApproval($info->next_approve_seq, $table_name, $info->created_by, $info->created_date, $info->application_id, $info->category_id, $info->company_id, $info->type, $info->interface_name);

                        $previous_approve_data[] = "update " . $this->db->dbprefix('approve_details_others') . " set updated_by=" . $this->session->userdata('user_id') . ", updated_date='" . date("Y-m-d H:i:s") .
                            "', approve_status=1, status='approved' where id=" . (int)$info->id . "; ";

                        $approve_details_previous[] = $previous_approve_data;       // update
                        if ($getNextApproval) {
                            $approve_details_new[] = $getNextApproval['approve_data']; // insert
                            $status = $getNextApproval['approve_data']['status'];
                            $seq = (($approve_details_new['next_approve_seq']) ? $approve_details_new['next_approve_seq'] : 0);
                            $query_info_close[] = "update " . $this->db->dbprefix($table_name) . " set updated_by=" . $this->session->userdata('user_id') . ", updated_date='" . date("Y-m-d H:i:s") .
                                "', status='" . $status . "', next_approve_seq=" . $seq . " where id=" . (int)$info->application_id . "; ";

                        } else {
                            $query_info_close[] = "update " . $this->db->dbprefix($table_name) . " set updated_by=" . $this->session->userdata('user_id') . ", updated_date='" . date("Y-m-d H:i:s") .
                                "', approved=1, status='approved', next_approve_seq=0 where id=" . (int)$info->application_id . "; ";
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('error', $this->lang->line("No_Data_Selected."));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->form_validation->run() == true && $this->cr_model->updateStatusChunk($approve_details_new, $previous_approve_data, $query_info_close, $table_name)) {
            $this->session->set_flashdata('message', lang('status_updated'));
            redirect('correction_request/approval_list/' . $table_name);
        } else {
            $this->session->set_flashdata('error', "Error encountered, please contact with admin");
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'correction_request/approval_list/' . $table_name);

        }
    }

    public function current_status_update($id)
    {

        $this->form_validation->set_rules('status', lang("sale_status"), 'required');

        $inv = $this->cr_model->getCRById($id);
        if ($this->form_validation->run() == true) {
            $status = $this->input->post('status');
            $note = $this->sma->clear_tags($this->input->post('update_note'));
            $cr_status = array(
                'cr_id' => $inv->id,
                'status' => $status,
                'update_note' => $note,
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s")
            );
            $status = array(
                'update_status' => $status,
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d H:i:s"),
            );
        } elseif ($this->input->post('update')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'correction_request');
        }

//        if ($this->form_validation->run() == true) {
        if ($this->form_validation->run() == true && $this->cr_model->updateCurrentStatus($inv->id, $cr_status, $status)) {
            $this->session->set_flashdata('message', lang('status_updated'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'cr/index');
        } else {
            $this->data['inv'] = $inv;
            $this->data['modal_js'] = $this->site->modal_js();
            $this->load->view($this->theme . 'cr/current_status_update', $this->data);
        }
    }

}