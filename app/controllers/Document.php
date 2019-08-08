<?php defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '-1');
// set max execution time 2 hours / mostly used for exporting PDF
ini_set('max_execution_time', 3600);

/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 12-Nov-18
 * Time: 9:55 AM
 */
class Document extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->permission_details = $this->site->checkPermissions();
        $this->lang->load('document', $this->Settings->user_language);
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/document';
        $this->upload_path_movement = 'assets/uploads/document/movement';
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
            if ((!$get_permission['document-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('document')));
        $meta = array('page_title' => lang('document'), 'bc' => $bc);
        $this->page_construct('document/index', $meta, $this->data);
    }


    function file_explorer()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['output_folder'] = $this->listFolder($this->path);

//         $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('document/file_explorer'."/".$this->data['output_folder']['path_in_url']), 'page' => lang('document')), array('link' => '#', 'page' => lang('File_Explorer')));
        $bc = array(array('link' => site_url('welcome'), 'page' => lang('home')), array('link' => site_url('document/file_explorer'), 'page' => lang('File_Explorer')), array('link' => '#', 'page' => $this->data['output_folder']['path_in_url']));

        $meta = array('page_title' => lang('document'), 'bc' => $bc);
        $this->page_construct('document/file_explorer', $meta, $this->data);
    }

    function getDocuments()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $edit_link = "";
        $delete_link = "";
        $update_status = "";
        if ($get_permission['document-edit'] || $this->Owner || $this->Admin) $edit_link = anchor('document/edit/$1', '<i class="fa fa-edit"></i> ' . lang('doc_edit'), 'class="sledit"');
        if ($get_permission['document-update_status'] || $this->Owner || $this->Admin) $update_status = anchor('document/update_status/$1', '<i class="fa fa-plus"></i> ' . lang('Status_Update'),'data-toggle="modal" data-target="#myModal"');
        if ($get_permission['document-delete'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("doc_delete") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('document/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('doc_delete') . "</a>";
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $edit_link . '</li>
            <li>' . $update_status . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('documents') . ".id as id, " . $this->db->dbprefix('documents') . ".name as nam," . $this->db->dbprefix('documents') . ".reference_no as ref," . $this->db->dbprefix('documents') . ".address," . $this->db->dbprefix('documents') . ".instrument," . $this->db->dbprefix('documents') . ".instrument_no," . $this->db->dbprefix('banks') . ".name as c_name," . $this->db->dbprefix('brands') . ".name as b_name,," . $this->db->dbprefix('documents') . ".year as years," . $this->db->dbprefix('documents') . ".status,". $this->db->dbprefix('documents') . ".credit_limit,". $this->db->dbprefix('documents') . ".total_cheque" )
            ->from("documents")
            ->join('brands', 'documents.commission_id=brands.id', 'left')
            ->join('banks', 'documents.instrument_bank=banks.id', 'left')
            ->group_by('documents.id')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }


    public function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Document";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('reference_no', lang("reference_no"), 'trim|required');
//        $this->form_validation->set_rules('reference_no', lang("reference_no"), 'is_unique[documents.reference_no]');
        $this->form_validation->set_rules('target_qty', lang("target_qty"), 'trim|required');
        $this->form_validation->set_rules('agreement_start_date', lang("agreement_start_date"), 'trim|required');
        $this->form_validation->set_rules('agreement_expire_date', lang("agreement_expire_date"), 'trim|required');
        $this->form_validation->set_rules('commission_id', lang("commission_id"), 'trim|required');
        $this->form_validation->set_rules('instrument', lang("instrument"), 'trim|required');
        $this->form_validation->set_rules('instrument_no', lang("instrument_no"), 'trim|required');
        $this->form_validation->set_rules('instrument_bank', lang("instrument_bank"), 'trim|required');
        $this->form_validation->set_rules('instrument_branch', lang("instrument_branch"), 'trim|required');
        $this->form_validation->set_rules('1_target', lang("1_target"), 'trim|required');
        $this->form_validation->set_rules('2_target', lang("2_target"), 'trim|required');
        $this->form_validation->set_rules('1_target_commission', lang("1_target_commission"), 'trim|required');
        $this->form_validation->set_rules('2_target_commission', lang("2_target_commission"), 'trim|required');
        $this->form_validation->set_rules('address', lang("address"), 'trim|required');
        $this->form_validation->set_rules('total_cheque', lang("total_cheque"), 'trim|required');
        $this->form_validation->set_rules('credit_limit', lang("credit_limit"), 'trim|required');
        $this->form_validation->set_rules('year', lang("year"), 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'name' => $this->input->post('name'),
                'reference_no' => $this->input->post('reference_no'),
                'target_qty' => $this->input->post('target_qty'),
                'agreement_start_date' => $this->sma->fld($this->input->post('agreement_start_date')),
                'agreement_expire_date' => $this->sma->fld($this->input->post('agreement_expire_date')),
                'commission_id' => $this->input->post('commission_id'),
                'instrument' => $this->input->post('instrument'),
                'instrument_no' => $this->input->post('instrument_no'),
                'instrument_bank' => $this->input->post('instrument_bank'),
                'instrument_branch' => $this->input->post('instrument_branch'),
                'c1_target' => $this->input->post('1_target'),
                'c2_target' => $this->input->post('2_target'),
                'c1_target_commission' => $this->input->post('1_target_commission'),
                'c2_target_commission' => $this->input->post('2_target_commission'),
                'address' => $this->input->post('address'),
                'year' => $this->input->post('year'),
                'total_cheque' => $this->input->post('total_cheque'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
                'credit_limit' => $this->input->post('credit_limit'),
                'status' => 'In Hand'
            );
        }

        if ($this->form_validation->run() == true && $this->document_model->addDocument($data)) {
            $this->session->set_flashdata('message', lang("doc_added"));
            redirect("document/index");

        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['brands'] = $this->site->getAllBands();
            $this->data['banks'] = $this->site->getAllBanks();
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('document'), 'page' => lang('document')), array('link' => '#', 'page' => lang('add_document')));
            $meta = array('page_title' => lang('add_document'), 'bc' => $bc);
            $this->page_construct('document/add_document', $meta, $this->data);
        }
    }

    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $documents_details = $this->document_model->getDocumentById($id);
        $delete_file = true;
        if ($documents_details->attachment_name) {
            $this->load->helper("file");
            $delete_file = unlink("./assets/uploads/document/" . $documents_details->attachment_name);
        }

        if ($this->document_model->deleteDocument($id) && $delete_file) {
            if ($this->input->is_ajax_request()) {
                echo lang("doc_deleted");
                die();
            }
            $this->session->set_flashdata('message', lang('doc_deleted'));
            redirect('document/index');
        }
    }


    function edit($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $this->data['title'] = "Edit Document";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('target_qty', lang("target_qty"), 'trim|required');
        $this->form_validation->set_rules('agreement_start_date', lang("agreement_start_date"), 'trim|required');
        $this->form_validation->set_rules('agreement_expire_date', lang("agreement_expire_date"), 'trim|required');
        $this->form_validation->set_rules('commission_id', lang("commission_id"), 'trim|required');
        $this->form_validation->set_rules('instrument', lang("instrument"), 'trim|required');
        $this->form_validation->set_rules('instrument_no', lang("instrument_no"), 'trim|required');
        $this->form_validation->set_rules('instrument_bank', lang("instrument_bank"), 'trim|required');
        $this->form_validation->set_rules('instrument_branch', lang("instrument_branch"), 'trim|required');
        $this->form_validation->set_rules('1_target', lang("1_target"), 'trim|required');
        $this->form_validation->set_rules('2_target', lang("2_target"), 'trim|required');
        $this->form_validation->set_rules('1_target_commission', lang("1_target_commission"), 'trim|required');
        $this->form_validation->set_rules('2_target_commission', lang("2_target_commission"), 'trim|required');
        $this->form_validation->set_rules('address', lang("address"), 'trim|required');
        $this->form_validation->set_rules('total_cheque', lang("total_cheque"), 'trim|required');
        $this->form_validation->set_rules('credit_limit', lang("credit_limit"), 'trim|required');
        $this->form_validation->set_rules('year', lang("year"), 'trim|required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'name' => $this->input->post('name'),
                'target_qty' => $this->input->post('target_qty'),
                'agreement_start_date' => $this->sma->fld($this->input->post('agreement_start_date')),
                'agreement_expire_date' => $this->sma->fld($this->input->post('agreement_expire_date')),
                'commission_id' => $this->input->post('commission_id'),
                'instrument' => $this->input->post('instrument'),
                'instrument_no' => $this->input->post('instrument_no'),
                'instrument_bank' => $this->input->post('instrument_bank'),
                'instrument_branch' => $this->input->post('instrument_branch'),
                'c1_target' => $this->input->post('1_target'),
                'c2_target' => $this->input->post('2_target'),
                'c1_target_commission' => $this->input->post('1_target_commission'),
                'c2_target_commission' => $this->input->post('2_target_commission'),
                'address' => $this->input->post('address'),
                'year' => $this->input->post('year'),
                'total_cheque' => $this->input->post('total_cheque'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
                'credit_limit' => $this->input->post('credit_limit')
            );

        }

        if ($this->form_validation->run() === TRUE && $this->document_model->updateDocument($id, $data)) {
            $this->session->set_flashdata('message', lang('doc_updated'));
            redirect("document/index");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['document'] = $this->document_model->getDocumentById($id);
            $this->data['brands'] = $this->site->getAllBands();
            $this->data['banks'] = $this->site->getAllBanks();
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('document/edit'), 'page' => lang('document')), array('link' => '#', 'page' => lang('doc_edit')));
            $meta = array('page_title' => lang('edit_document'), 'bc' => $bc);
            $this->page_construct('document/edit_document', $meta, $this->data);
        }
    }


    public function add_movement()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-add_movement'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Document Movement";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('reference_no', lang("reference_no"), 'trim');
        $this->form_validation->set_rules('document_id', lang("document_id"), 'trim|required');
        $this->form_validation->set_rules('application_type', lang("application_type"), 'trim|required');
        $this->form_validation->set_rules('responsible_person', lang("responsible_person"), 'trim|required');
        $this->form_validation->set_rules('notification_date', lang("notification_date"), 'trim');
        $this->form_validation->set_rules('expire_date', lang("expire_date"), 'trim');
        $this->form_validation->set_rules('other_info', lang("other_info"), 'trim');
        $this->form_validation->set_rules('processing_fees', lang("processing_fees"), 'trim');

        if ($this->form_validation->run() == true) {

            $doc_url = "";
            if ($this->input->post('notification_date')) $notification_date = $this->sma->fld($this->input->post('notification_date'));
            if ($this->input->post('expire_date')) $expire_date = $this->sma->fld($this->input->post('expire_date'));

            $data = array(
                'name' => $this->input->post('name'),
                'reference_no' => $this->input->post('reference_no'),
                'document_id' => $this->input->post('document_id'),
                'application_type' => $this->input->post('application_type'),
                'responsible_person' => $this->input->post('responsible_person'),
                'processing_fees' => $this->input->post('processing_fees'),
                'created_by' => $this->session->userdata('user_id'),
                'notification_date' => $notification_date,
                'expire_date' => $expire_date,
                'created_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
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
                $data['url'] = $doc_url;
                $data['attachment_name'] = $this->upload->file_name;

            }

        }

        if ($this->form_validation->run() == true && $this->document_model->addDocumentMovement($data)) {
            $this->session->set_flashdata('message', lang("doc_mov_added"));
            redirect("document/doc_movement_list");

        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['companies'] = $this->site->getAllCompany();
            $this->data['docs'] = $this->site->getAllDoc();
            $this->data['employees'] = $this->site->getAllEmployees();

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('document'), 'page' => lang('document')), array('link' => '#', 'page' => lang('add_movement')));
            $meta = array('page_title' => lang('add_movement'), 'bc' => $bc);
            $this->page_construct('document/add_movement', $meta, $this->data);
        }
    }


    public function doc_movement_list()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-doc_movement_list'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('doc_movement_list')));
        $meta = array('page_title' => lang('doc_movement_list'), 'bc' => $bc);
        $this->page_construct('document/doc_movement_list', $meta, $this->data);
    }

    function getDocumentMovement()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-doc_movement_list'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $edit_link = "";
        $delete_link = "";
        if ($get_permission['document-edit_movement'] || $this->Owner || $this->Admin) $edit_link = anchor('document/edit_movement/$1', '<i class="fa fa-edit"></i> ' . lang('edit_movement'), 'class="sledit"');
        if ($get_permission['document-delete_movement'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete_movement") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('document/delete_movement/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_movement') . "</a>";
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
            ->select($this->db->dbprefix('document_movement') . ".id as id, " . $this->db->dbprefix('document_movement') . ".name as nam," . $this->db->dbprefix('documents') . ".name as ref," . $this->db->dbprefix('company') . ".name as c_name,upper(" . $this->db->dbprefix('document_movement') . ".application_type) as status," . $this->db->dbprefix('document_movement') . ".processing_fees as p_name, " . $this->db->dbprefix('document_movement') . ".expire_date as e_date," . $this->db->dbprefix('document_movement') . ".notification_date as n_date, concat(" . $this->db->dbprefix('document_movement') . ".url,'#351#'," . $this->db->dbprefix('document_movement') . ".attachment_name) as url")
            ->from("document_movement")
            ->join('documents', 'document_movement.document_id=documents.id', 'left')
            ->join('company', 'documents.company_id=company.id', 'left')
            ->group_by('document_movement.id')
//            ->order_by('document_movement.notification_date','desc')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }


    function delete_movement($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-delete_movement'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $documents_details = $this->document_model->getDocumentMovementById($id);
        $delete_file = true;
        if ($documents_details->attachment_name) {
            $this->load->helper("file");
            $delete_file = unlink("./assets/uploads/document/movement/" . $documents_details->attachment_name);
        }

        if ($this->document_model->deleteDocumentMovement($id) && $delete_file) {
            if ($this->input->is_ajax_request()) {
                echo lang("doc_mov_deleted");
                die();
            }
            $this->session->set_flashdata('message', lang('doc_mov_deleted'));
            redirect('document/doc_movement_list');
        }
    }


    function edit_movement($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $this->data['title'] = "Edit Document Movement";
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        $this->form_validation->set_rules('reference_no', lang("reference_no"), 'trim');
        $this->form_validation->set_rules('document_id', lang("document_id"), 'trim|required');
        $this->form_validation->set_rules('application_type', lang("application_type"), 'trim|required');
        $this->form_validation->set_rules('responsible_person', lang("responsible_person"), 'trim|required');
        $this->form_validation->set_rules('notification_date', lang("notification_date"), 'trim');
        $this->form_validation->set_rules('expire_date', lang("expire_date"), 'trim');
        $this->form_validation->set_rules('other_info', lang("other_info"), 'trim');
        $this->form_validation->set_rules('processing_fees', lang("processing_fees"), 'trim');


        if ($this->form_validation->run() == true) {

            $doc_url = "";
            if ($this->input->post('notification_date')) $notification_date = $this->sma->fld($this->input->post('notification_date'));
            if ($this->input->post('expire_date')) $expire_date = $this->sma->fld($this->input->post('expire_date'));

            $data = array(
                'name' => $this->input->post('name'),
                'reference_no' => $this->input->post('reference_no'),
                'document_id' => $this->input->post('document_id'),
                'application_type' => $this->input->post('application_type'),
                'responsible_person' => $this->input->post('responsible_person'),
                'processing_fees' => $this->input->post('processing_fees'),
                'created_by' => $this->session->userdata('user_id'),
                'notification_date' => $notification_date,
                'expire_date' => $expire_date,
                'created_date' => date("Y-m-d H:i:s"),
                'other_info' => $this->input->post('other_info'),
            );

            if ($_FILES['document']['size'] > 0) {
                $t = true;
                $document_details = $this->document_model->getMovementById($id);
                if ($document_details->attachment_name) {
                    $this->load->helper("file");
                    $t = unlink("./assets/uploads/document/movement/" . $document_details->attachment_name);
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
                $doc_url = (($this->upload_path_movement) . "/" . ($photo = $this->upload->file_name));
                $data['url'] = $doc_url;
                $data['attachment_name'] = $this->upload->file_name;

            }

        }
        if ($this->form_validation->run() === TRUE && $this->document_model->updateMovement($id, $data)) {
            $this->session->set_flashdata('message', lang('doc_mov_updated'));
            redirect("document/doc_movement_list");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['document'] = $this->document_model->getMovementById($id);
            $this->data['companies'] = $this->site->getAllCompany();
            $this->data['docs'] = $this->site->getAllDoc();
            $this->data['employees'] = $this->site->getAllEmployees();
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('document/edit_movement'), 'page' => lang('document')), array('link' => '#', 'page' => lang('doc_mov_updated')));
            $meta = array('page_title' => lang('edit_movement'), 'bc' => $bc);
            $this->page_construct('document/edit_movement', $meta, $this->data);
        }

    }

    function listFolder()
    {
        $segment_array = $this->uri->segment_array();

        // first and second segments are our controller and the 'virtual root'
        $controller = array_shift($segment_array);
        $virtual_root = array_shift($segment_array);

//        if( empty( $this->roots )) exit( 'no roots defined' );

        // let's check if a virtual root is choosen
        // if this controller is the default controller, first segment is 'index'
//        if ( $controller == 'index' OR $virtual_root == '' ) show_404();

        // let's check if a virtual root matches
//        if ( ! array_key_exists( $virtual_root, $this->roots )) show_404();

        // build absolute path
        $path_in_url = '';
        foreach ($segment_array as $segment) $path_in_url .= $segment . '/';
        $absolute_path = $this->path . '/' . $path_in_url;
        $absolute_path = rtrim($absolute_path);

        // is it a directory or a file ?
        if (is_dir($absolute_path)) {
            // we'll need this to build links
            $this->load->helper('url');

            $dirs = array();
            $files = array();
            // let's traverse the directory
            if ($handle = @opendir($absolute_path)) {
                while (false !== ($file = readdir($handle))) {
                    if (($file != "." AND $file != "..")) {
                        if (is_dir($absolute_path . '/' . $file)) {
                            $dirs[]['name'] = $file;
                        } else {
                            $files[]['name'] = $file;
                        }
                    }
                }
                closedir($handle);
                sort($dirs);
                sort($files);
            }
            // parent directory
            // here to ensure it's available and the first in the array
            if ($path_in_url != '')
                array_unshift($dirs, array('name' => '..'));

            // send the view
            $data = array(
                'controller' => $controller,
                'virtual_root' => $virtual_root,
                'path_in_url' => $path_in_url,
                'dirs' => $dirs,
                'files' => $files,
            );
            return $data;
        }
    }

//https://github.com/bcit-ci/CodeIgniter/wiki/simple-file-browser


    function checkAndMakeDirectory($path)
    {
        if (file_exists($path)) {
            if (!is_dir($path)) { //if file is already present, but it's not a dir
                //do something with file - delete, rename, etc.
                //unlink($path); //for example
                mkdir($path, 0777);
            }
        } else { //no file exists with this name
            mkdir($path, 0777);
        }
        return true;
    }

    function getSubCategories($category_id = NULL)
    {
        if ($rows = $this->document_model->getSubCategories($category_id)) {
            $data = json_encode($rows);
        } else {
            $data = false;
        }
        echo $data;
    }

    public function file_manager()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-file_manager'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('File_Manager')));
        $meta = array('page_title' => lang('File_Manager'), 'bc' => $bc);
        $this->page_construct('filemanager/filemanager', $meta, $this->data);
    }

    public function elfinder_init()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-file_manager'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $current_users = $this->document_model->getUsersByID($this->session->userdata('user_id'));

        $this->load->helper('path');
        $_allowed_files = explode('|', $this->digital_file_types);
        $config_allowed_files = array();
        if (is_array($_allowed_files)) {
            foreach ($_allowed_files as $v_extension) {
                array_push($config_allowed_files, '.' . $v_extension);
            }
        }
        $allowed_files = array();
        if (is_array($config_allowed_files)) {
            foreach ($config_allowed_files as $extension) {
                $_mime = get_mime_by_extension($extension);

                if ($_mime == 'application/x-zip') {
                    array_push($allowed_files, 'application/zip');
                }
                if ($extension == '.exe') {
                    array_push($allowed_files, 'application/x-executable');
                    array_push($allowed_files, 'application/x-msdownload');
                    array_push($allowed_files, 'application/x-ms-dos-executable');
                }
                array_push($allowed_files, $_mime);
            }
        }
        if ($this->Owner || $this->Admin || $current_users->document_path == 'all') {
            $root_options = array(
                'driver' => 'LocalFileSystem',
                'path' => set_realpath('assets/uploads/docs'),
                'URL' => site_url('assets/uploads/docs/'),
                'uploadMaxSize' => $this->allowed_file_size . 'M',
                'accessControl' => 'access',
                'uploadAllow' => array('application/pdf',
                    'application/force-download',
                    'application/x-download',
                    'image/png',
                    'image/jpeg',
                    'image/gif',
                    'application/zip',
                    'binary/octet-stream'),
                'uploadOrder' => array(
                    'allow',
                    'deny'
                ),
                'attributes' => array(
                    array(
                        'pattern' => '/.tmb/',
                        'hidden' => true
                    ),
                    array(
                        'pattern' => '/.quarantine/',
                        'hidden' => true
                    ),
                    array(
                        'read' => true,
                        'write' => true,
                    )
                )
            );

        } else {
            $disabled = array();

            $upload = array('');
            if (!($get_permission['document-upload'])) array_push($upload, "all");
            $get_permission = $this->permission_details[0];
            if (!($get_permission['document-folder_download'])) array_push($disabled, "zipdl");
            if (!($get_permission['document-folder_create'])) array_push($disabled, 'extract', 'archive', 'mkdir');
            if (!($get_permission['document-file_delete'])) array_push($disabled, 'rename', 'rm', 'cut');

            $root_options = array(
                'driver' => 'LocalFileSystem',
                'path' => set_realpath('assets/uploads/docs/' . $current_users->document_path),
                'URL' => site_url('assets/uploads/docs/' . $current_users->document_path . '/'),
                'uploadMaxSize' => $this->allowed_file_size_new . 'M',
                'accessControl' => 'access',
                'uploadAllow' => array('application/pdf',
                    'application/force-download',
                    'application/x-download',
                    'image/png',
                    'image/jpeg',
                    'image/gif',
                    'application/zip',
                    'binary/octet-stream'),
                'disabled' => $disabled,
                'uploadDeny' => $upload,
                'uploadOrder' => array(
                    'allow',
                    'deny'
                ),
                'attributes' => array(
                    array(
                        'pattern' => '/.tmb/',
                        'hidden' => true
                    ),
                    array(
                        'pattern' => '/.quarantine/',
                        'hidden' => true
                    ),
                    array(
//                    'pattern' => '/^\/TEST$/',
                        'read' => true,
                        'write' => true,
//                    'locked'  => true
                    )
                )
            );
        }
        $opts = array(
            'roots' => array(
                $root_options
            )
        );
        $this->load->library('elfinder_lib', $opts);
    }

    function modal_view($id = NULL) {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['document-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $pr_details = $this->document_model->getDocumentById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('doc_not_found'));
            $this->sma->md();
        }
        $this->data['document'] = $pr_details;
        $this->data['unit'] = "Ton";
        $this->data['bank'] = $this->document_model->getBankById($pr_details->instrument_bank);
        $this->data['commission'] = $this->document_model->getCommissionById($pr_details->commission_id);
        $this->load->view($this->theme . 'document/modal_view', $this->data);
    }


    public function update_status($id)
    {

        $this->form_validation->set_rules('status', lang("status"), 'required');

        $pr_details = $this->document_model->getDocumentById($id);
        if ($this->form_validation->run() == true) {
            $status = $this->input->post('status');
            $update_status = array(
                'status' => $status,
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d H:i:s")
            );
        } elseif ($this->input->post('update')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'document');
        }

        if ($this->form_validation->run() == true && $this->document_model->updateStatus($pr_details->id, $update_status)) {
            $this->session->set_flashdata('message', lang('status_updated'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'document');
        } else {
            $this->data['document'] = $pr_details;
            $this->data['modal_js'] = $this->site->modal_js();
            $this->load->view($this->theme . 'document/update_status', $this->data);
        }
    }
}