<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->permission_details = $this->site->checkPermissions();
        $this->lang->load('employees', $this->Settings->user_language);
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->data['logo'] = true;
        $this->load->library('form_validation');
        $this->load->model('employees_model');
    }

    function index()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('employees')));
        $meta = array('page_title' => lang('employees'), 'bc' => $bc);
        $this->page_construct('employees/index', $meta, $this->data);
    }

    function getEmployees()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $edit_link = "";
        $delete_link = "";
        if ($get_permission['employees-edit'] || $this->Owner || $this->Admin) $edit_link = anchor('employees/edit_employee/$1', '<i class="fa fa-edit"></i> ' . lang('edit_employee'), 'class="sledit"');
        if ($get_permission['employees-delete'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete_employee") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('employees/delete_employee/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_employee') . "</a>";
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
            ->select($this->db->dbprefix('employees') . ".id as id, employee_id," . $this->db->dbprefix('employees') . ".name as nam," . $this->db->dbprefix('designations') . ".name as d_name," . $this->db->dbprefix('company') . ".name as c_name," . $this->db->dbprefix('operators') . ".name as po_name," . $this->db->dbprefix('packages') . ".name as p_name,mobile_number, ceiling_amount,credit_limit, active")
            ->from("employees")
            ->join('company', 'employees.company_id=company.id', 'left')
            ->join('operators', 'employees.operator_id=operators.id', 'left')
            ->join('packages', 'employees.package_id=packages.id', 'left')
            ->join('designations', 'employees.designation_id=designations.id', 'left')
            ->group_by('employees.id')
            ->edit_column('active', '$1__$2', 'active, id')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    function add_employee()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Employee";
        $this->form_validation->set_rules('employee_id', lang("employee_id"), 'trim|required|is_unique[employees.employee_id]');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('operator_id', lang("operator_id"), 'trim|required');
        $this->form_validation->set_rules('package_id', lang("package_id"), 'trim|required');
        $this->form_validation->set_rules('mobile_number', lang("mobile_number"), 'trim|required|is_unique[employees.mobile_number]|regex_match[/^[0-9]{10,14}$/]');
        $this->form_validation->set_rules('ceiling_amount', lang("ceiling_amount"), 'trim|required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
        //$this->form_validation->set_rules('email', lang("email"), 'trim|valid_email|is_unique[employees.email]');
//        $this->form_validation->set_rules('email', lang("email"), 'trim|required|valid_email|is_unique[employees.email]');
//        $this->form_validation->set_rules('service_start_date', lang("service_start_date"), 'trim|required');
        $this->form_validation->set_rules('service_start_date', lang("service_start_date"), 'trim');
        $this->form_validation->set_rules('active', lang("active"), 'trim|required');
        $this->form_validation->set_rules('credit_limit', lang("credit_limit"), 'trim|required|numeric|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $email = null;
            if ($this->input->post('id')) $email = $this->input->post('email');
            $service_start_date = (string)$this->input->post('service_start_date');
            $actual_date = "";
            if ($service_start_date != "") {
                $new_service_start_date = date('d-m-Y', strtotime($service_start_date));
                $actual_date = date('Y-m-d', strtotime($new_service_start_date));
            }
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'designation_id' => $this->input->post('designation_id'),
                'company_id' => $this->input->post('company_id'),
                'operator_id' => $this->input->post('operator_id'),
                'package_id' => $this->input->post('package_id'),
                'email' => $email,
                'mobile_number' => $this->input->post('mobile_number'),
                'ceiling_amount' => $this->input->post('ceiling_amount'),
                'credit_limit' => $this->input->post('credit_limit'),
                'name' => $this->input->post('name'),
                'service_start_date' => $actual_date,
                'active' => $this->input->post('active'),
            );
        }

        if ($this->form_validation->run() == true && $this->employees_model->addEmployee($data)) {
            $this->session->set_flashdata('message', lang("employee_added"));
            redirect("employees/index");

        } else {
            $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
            $this->data['companies'] = $this->employees_model->getAllCompanies();
            $this->data['operators'] = $this->employees_model->getAllOperators();
            $this->data['packages'] = $this->employees_model->getAllPackages();
            $this->data['designations'] = $this->employees_model->getAllDesignations();
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('employees/add_employee'), 'page' => lang('employee')), array('link' => '#', 'page' => lang('add_employee')));
            $meta = array('page_title' => lang('employees'), 'bc' => $bc);
            $this->page_construct('employees/add_employee', $meta, $this->data);
        }
    }

    function edit_employee($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-edit'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $this->data['title'] = lang("edit_employee");

        $this->data['title'] = "Add Employee";
        $this->form_validation->set_rules('employee_id', lang("employee_id"), 'trim|required');
        $this->form_validation->set_rules('designation_id', lang("designation_id"), 'trim|required');
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('operator_id', lang("operator_id"), 'trim|required');
        $this->form_validation->set_rules('package_id', lang("package_id"), 'trim|required');
        $this->form_validation->set_rules('mobile_number', lang("mobile_number"), 'trim|required|regex_match[/^[0-9]{10,14}$/]');
        $this->form_validation->set_rules('ceiling_amount', lang("ceiling_amount"), 'trim|required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('credit_limit', lang("credit_limit"), 'trim|required|numeric|is_natural_no_zero');
        $this->form_validation->set_rules('name', lang("name"), 'trim|required');
//        $this->form_validation->set_rules('email', lang("email"), 'trim|required|valid_email');
        //    $this->form_validation->set_rules('email', lang("email"), 'trim');
        $this->form_validation->set_rules('service_start_date', lang("service_start_date"), 'trim');
//        $this->form_validation->set_rules('service_start_date', lang("service_start_date"), 'trim|required');
        $this->form_validation->set_rules('active', lang("active"), 'trim|required');


        if ($this->form_validation->run() == true) {
            $email = null;
            if ($this->input->post('id')) $email = $this->input->post('email');
            $service_start_date = (string)$this->input->post('service_start_date');
            $actual_date = "";
            if ($service_start_date != "") {
                $new_service_start_date = date('d-m-Y', strtotime($service_start_date));
                $actual_date = date('Y-m-d', strtotime($new_service_start_date));
            }
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'designation_id' => $this->input->post('designation_id'),
                'company_id' => $this->input->post('company_id'),
                'operator_id' => $this->input->post('operator_id'),
                'package_id' => $this->input->post('package_id'),
                'email' => $email,
                'mobile_number' => $this->input->post('mobile_number'),
                'ceiling_amount' => $this->input->post('ceiling_amount'),
                'credit_limit' => $this->input->post('credit_limit'),
                'name' => $this->input->post('name'),
//                'service_start_date' => $this->input->post('service_start_date'),
                'service_start_date' => $actual_date,
                'active' => $this->input->post('active'),
            );
        }

        if ($this->form_validation->run() === TRUE && $this->employees_model->updateEmployee($id, $data)) {
            $this->session->set_flashdata('message', lang('employee_updated'));
            redirect("employees/index");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['employee'] = $this->employees_model->getEmployeeById($id);
            $this->data['companies'] = $this->employees_model->getAllCompanies();
            $this->data['operators'] = $this->employees_model->getAllOperators();
            $this->data['packages'] = $this->employees_model->getAllPackages();
            $this->data['designations'] = $this->employees_model->getAllDesignations();
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('employees/add_employee'), 'page' => lang('employee')), array('link' => '#', 'page' => lang('edit_employee')));
            $meta = array('page_title' => lang('employees'), 'bc' => $bc);
            $this->page_construct('employees/edit_employee', $meta, $this->data);
        }
    }

    function delete_employee($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->employees_model->deleteEmployee($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("employee_deleted");
                die();
            }
            $this->session->set_flashdata('message', lang('employee_deleted'));
            redirect('employees/index');
        }
    }


    public function employee_by_csv()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-employee_by_csv'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');
        $this->form_validation->set_message('is_natural_no_zero', lang("no_zero_required"));
        $this->form_validation->set_rules('company_id', lang("company_id"), 'trim|required');
        $this->form_validation->set_rules('operator_id', lang("operator_id"), 'trim|required');
        $this->form_validation->set_rules('package_id', lang("package_id"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $company_id = $this->input->post('company_id');
            $operator_id = $this->input->post('operator_id');
            $package_id = $this->input->post('package_id');

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');

                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("employees/employee_by_csv");
                }

                $csv = $this->upload->file_name;
                $data['attachment'] = $csv;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);

                $keys = array('employee_id', 'name', 'email', 'mobile_no', 'ceiling_amount', 'credit_limit', 'designation_code', 'service_start_date');
                $final = array();
                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }
                $rw = 2;

                foreach ($final as $csv_pr) {
                    if (isset($csv_pr['designation_code']) && isset($csv_pr['employee_id']) && isset($csv_pr['name'])) {

                        $designation_details = $this->employees_model->getDesignationByCode($csv_pr['designation_code']);
                        if (!$designation_details) {
                            $this->session->set_flashdata('error', lang("designation_code") . " ( " . $csv_pr['designation_code'] . " ). " . "not found");
                            redirect($_SERVER["HTTP_REFERER"]);
                        }
                        $service_start_date = (string)$csv_pr['service_start_date'];
                        $new_service_start_date = date('d-m-Y', strtotime($service_start_date));
                        $actual_date = date('Y-m-d', strtotime($new_service_start_date));

                        $employees[] = array(
                            'employee_id' => $csv_pr['employee_id'],
                            'designation_id' => $designation_details->id,
                            'company_id' => $company_id,
                            'operator_id' => $operator_id,
                            'package_id' => $package_id,
                            'email' => $csv_pr['email'],
                            'mobile_number' => $csv_pr['mobile_no'],
                            'ceiling_amount' => $csv_pr['ceiling_amount'],
                            'credit_limit' => $csv_pr['credit_limit'],
                            'name' => $csv_pr['name'],
                            'service_start_date' => $actual_date,
                            'active' => 1,
                        );
                    }
                }

            }
        }


        if ($this->form_validation->run() == true && $this->employees_model->addEmployees($employees)) {
            $this->session->set_flashdata('message', lang("employee_added"));
            redirect("employees/index");
        } else {

            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['companies'] = $this->employees_model->getAllCompanies();
            $this->data['operators'] = $this->employees_model->getAllOperators();
            $this->data['packages'] = $this->employees_model->getAllPackages();

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees'), 'page' => lang('sales')), array('link' => '#', 'page' => lang('add_sale_by_csv')));
            $meta = array('page_title' => lang('add_employee_by_csv'), 'bc' => $bc);
            $this->page_construct('employees/employee_by_csv', $meta, $this->data);

        }
    }

    function employees_actions($wh = NULL)
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'delete') {

                    $this->sma->checkPermissions('delete');
                    foreach ($_POST['val'] as $id) {
                        $this->employees_model->deleteEmployee($id);
                    }
                    $this->session->set_flashdata('message', $this->lang->line("employee_deleted"));
                    redirect($_SERVER["HTTP_REFERER"]);
                } elseif ($this->input->post('form_action') == 'export_excel' || $this->input->post('form_action') == 'export_pdf') {

                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle('Employees');
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('employee_id'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('name'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('designation_name'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('company_name'));
                    $this->excel->getActiveSheet()->SetCellValue('E1', lang('operator_name'));
                    $this->excel->getActiveSheet()->SetCellValue('F1', lang('package_name'));
                    $this->excel->getActiveSheet()->SetCellValue('G1', lang('mobile_no'));
                    $this->excel->getActiveSheet()->SetCellValue('H1', lang('ceiling_amount'));
                    $this->excel->getActiveSheet()->SetCellValue('I1', lang('credit_limit'));
                    $this->excel->getActiveSheet()->SetCellValue('J1', lang('service_start_date'));
                    $this->excel->getActiveSheet()->SetCellValue('K1', lang('status'));
//
                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $employees = $this->employees_model->getALlEmployeeDetails($id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $employees->employee_id);
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $employees->name);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $employees->d_name);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $employees->c_name);
                        $this->excel->getActiveSheet()->SetCellValue('E' . $row, $employees ? $employees->o_name : '');
                        $this->excel->getActiveSheet()->SetCellValue('F' . $row, $employees->p_name);
                        $this->excel->getActiveSheet()->SetCellValue('G' . $row, $employees->mobile_number);
                        $this->excel->getActiveSheet()->SetCellValue('H' . $row, $employees->ceiling_amount);
                        $this->excel->getActiveSheet()->SetCellValue('I' . $row, $employees->credit_limit);
                        $this->excel->getActiveSheet()->SetCellValue('J' . $row, $employees->service_start_date);
                        $this->excel->getActiveSheet()->SetCellValue('K' . $row, $employees->active = 1 ? 'Active' : 'Inactive');
                        $row++;
                    }

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
                    $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'employees_' . date('Y_m_d_H_i_s');
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


    function bills()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-bill_index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('employees')));
        $meta = array('page_title' => lang('bills'), 'bc' => $bc);
        $this->page_construct('employees/bills', $meta, $this->data);
    }

    function getBills()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-bill_index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($get_permission['employees-bill_delete'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete_bill") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('employees/delete_bill/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_bill') . "</a>";
        $detail_link = anchor('employees/view_bills/$1', '<i class="fa fa-file-text-o"></i> ' . lang('bill_details'));
        $detail_link_company = anchor('employees/view_bills/$1', '<i class="fa fa-file-text-o"></i> ' . lang('bill_details_company'));
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $detail_link . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('bills') . ".reference_no as id, " . $this->db->dbprefix('operators') . ".name as op_name," . $this->db->dbprefix('packages') . ".name as pa_name,sum(" . $this->db->dbprefix('bills') . ".ceiling_amount) as c_amount,round(sum(" . $this->db->dbprefix('bills') . ".usage_amount),2) as u_amount," . $this->db->dbprefix('bills') . ".month," . $this->db->dbprefix('bills') . ".year")
            ->from("bills")
            ->join('operators', 'bills.operator_id=operators.id', 'left')
            ->join('packages', 'bills.package_id=packages.id', 'left')
            ->group_by('bills.month')
            ->group_by('bills.year')
            ->group_by('bills.reference_no')
            ->edit_column('active', '$1__$2', 'active, id')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function bill_add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-bill_add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');
//        $this->form_validation->set_message('is_natural_no_zero', lang("no_zero_required"));
        $this->form_validation->set_rules('year', lang("year"), 'trim|required');
        $this->form_validation->set_rules('month', lang("month"), 'trim|required');
        $this->form_validation->set_rules('operator_id', lang("operator_id"), 'trim|required');
        $this->form_validation->set_rules('start_date', lang("start_date"), 'trim|required');
        $this->form_validation->set_rules('end_date', lang("end_date"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $month = $this->input->post('month');
            $operator_id = $this->input->post('operator_id');
            $package_id = $this->input->post('package_id');
            $year = $this->input->post('year');
            $start_date = $this->sma->fsd($this->input->post('start_date'));
            $end_date = $this->sma->fsd($this->input->post('end_date'));

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');

                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("employees/bill_upload_by_csv");
                }

                $csv = $this->upload->file_name;
                $data['attachment'] = $csv;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);

                $keys = array('mobile_no', 'usage_amount');
                $final = array();
                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }
                $rw = 2;

                foreach ($final as $csv_pr) {
                    if (isset($csv_pr['mobile_no']) && isset($csv_pr['usage_amount'])) {

                        $bill_details = $this->employees_model->getBillByMonthAndYear($month, $year, $operator_id, $package_id);
                        if ($bill_details) {
                            $this->session->set_flashdata('error', lang("bill_already_exist"));
                            redirect($_SERVER["HTTP_REFERER"]);
                        }

                        $employee_details = $this->employees_model->getEmployeeByMobile($csv_pr['employee_code'], $csv_pr['mobile_no']);
//                        if (!$employee_details) {
//                            $this->session->set_flashdata('error', lang("mobile_number") . " ( " .$csv_pr['mobile_no'] . " ). " . "not found");
//                            redirect($_SERVER["HTTP_REFERER"]);
//                        }
                        $celling_amount = 0;
                        $usage_amount = 0;
                        if ($employee_details) {
                            $dues = 0;
                            $celling_amount = (float)$employee_details->ceiling_amount;
                            $usage_amount = (float)$csv_pr['usage_amount'];
                            if ($celling_amount < $usage_amount) $dues = ($usage_amount - $celling_amount);
                            $bills[] = array(
                                'employee_id' => $employee_details->employee_id,
                                'reference_no' => ($year . "_" . $month . "_" . $operator_id . "_" . $package_id),
                                'year' => $year,
                                'month' => $month,
                                'operator_id' => $operator_id,
                                'package_id' => $package_id,
                                'start_date' => $start_date,
                                'end_date' => $end_date,
                                'mobile_number' => $csv_pr['mobile_no'],
                                'ceiling_amount' => $employee_details->ceiling_amount,
                                'company_id' => $employee_details->company_id,
                                'designation_id' => $employee_details->designation_id,
                                'usage_amount' => $csv_pr['usage_amount'],
                                'dues' => $dues,
                            );
                        }
                        // csv data check

                    }
                }

            }
        }


        if ($this->form_validation->run() == true && $this->employees_model->addBills($bills)) {
            $this->session->set_flashdata('message', lang("bill_added"));
            redirect("employees/bills");
        } else {

            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['companies'] = $this->employees_model->getAllCompanies();
            $this->data['operators'] = $this->employees_model->getAllOperators();
            $this->data['packages'] = $this->employees_model->getAllPackages();

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees'), 'page' => lang('employees')), array('link' => '#', 'page' => lang('bill_upload')));
            $meta = array('page_title' => lang('add_employee_by_csv'), 'bc' => $bc);
            $this->page_construct('employees/bill_upload_by_csv', $meta, $this->data);

        }
    }


    function delete_bill($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-bill_delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->employees_model->deleteBill($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("bill_deleted");
                die();
            }
            $this->session->set_flashdata('message', lang('bill_deleted'));
            redirect('employees/bills');
        }
    }

    public function view_bills($bill_id = null)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-bill_index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $info = $this->employees_model->getAllBillDetails($bill_id);
        $this->data['id'] = $bill_id;
        $this->data['rows'] = $info;
        $this->data['supplier'] = $this->employees_model->getOperatorByID($info[0]->operator_id);
//        $this->data['warehouse'] = $this->site->getWarehouseByID(1);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees'), 'page' => lang('bill_details')), array('link' => '#', 'page' => lang('view')));
        $meta = array('page_title' => lang('view_purchase_details'), 'bc' => $bc);
        $this->page_construct('employees/view', $meta, $this->data);

    }

    public function pdf($bill_id = null, $view = null, $save_bufffer = null)
    {
        //$this->sma->checkPermissions();

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        $footer = ' <table width="100%">
        <tr>
            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="text-transform: capitalize;">

                    <p style="border-top: 1px solid #000;">Prepared By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Checked By</p>
                </div>
            </td>


            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Verified By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Approved By</p>
                </div>
            </td>

        </tr>
    </table>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $info = $this->employees_model->getAllBillDetails($bill_id);
        $this->data['id'] = $bill_id;
        $this->data['rows'] = $info;
        $this->data['supplier'] = $this->employees_model->getOperatorByID($info[0]->operator_id);
//        $this->data['warehouse'] = $this->site->getWarehouseByID(1);
        $name = $this->lang->line("bills") . "_" . str_replace('/', '_', $bill_id) . ".pdf";
        $html = $this->load->view($this->theme . 'employees/pdf', $this->data, true);
        if (!$this->Settings->barcode_img) {
            $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
        }
        if ($view) {
            $this->load->view($this->theme . 'employees/pdf', $this->data);
        } elseif ($save_bufffer) {
            return $this->sma->generate_pdf($html, $name, $save_bufffer);
        } else {
            $this->sma->generate_pdf($html, $name, null, $footer);
        }

    }


    function xls_all($bill_id = null)
    {
        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle(lang('bill'));
        $this->excel->getActiveSheet()->SetCellValue('A1', lang('emp_id'));
        $this->excel->getActiveSheet()->SetCellValue('B1', lang('name'));
        $this->excel->getActiveSheet()->SetCellValue('C1', lang('designation'));
        $this->excel->getActiveSheet()->SetCellValue('D1', lang('company_name'));
        $this->excel->getActiveSheet()->SetCellValue('E1', lang('package_name'));
        $this->excel->getActiveSheet()->SetCellValue('F1', lang('mobile_number'));
        $this->excel->getActiveSheet()->SetCellValue('G1', lang('ceiling_amount'));
        $this->excel->getActiveSheet()->SetCellValue('H1', lang('usage_amount'));
        $this->excel->getActiveSheet()->SetCellValue('I1', lang('dues'));
        $row = 2;

        $bill_items = $this->employees_model->getAllBillDetailsForUploadAll($bill_id);
        foreach ($bill_items as $bill_item) {
            $dues_amount = ($bill_item->ceiling_amount - $bill_item->usage_amount);
            $this->excel->getActiveSheet()->SetCellValue('A' . $row, $bill_item->employee_id);
            $this->excel->getActiveSheet()->SetCellValue('B' . $row, $bill_item->nam);
            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $bill_item->d_name);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $bill_item->c_name);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $bill_item->p_name);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $bill_item->mobile_number);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $bill_item->ceiling_amount);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $bill_item->usage_amount);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, $bill_item->dues);
            $row++;
        }

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $filename = 'bills_' . date('Y_m_d_H_i_s');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        set_time_limit(120);
        ini_set('memory_limit', '256M');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_end_clean();
        return $objWriter->save('php://output');
    }


    function xls($bill_id = null)
    {
        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle(lang('bill'));
        $this->excel->getActiveSheet()->SetCellValue('A1', lang('emp_id'));
        $this->excel->getActiveSheet()->SetCellValue('B1', lang('mobile_number'));
        $this->excel->getActiveSheet()->SetCellValue('C1', lang('dues_amount'));
        $row = 2;

        $bill_items = $this->employees_model->getAllBillDetailsForUpload($bill_id);
        foreach ($bill_items as $bill_item) {
            $dues_amount = ($bill_item->ceiling_amount - $bill_item->usage_amount);
            if (round($bill_item->dues, 2) > 0) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $bill_item->employee_id);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $bill_item->mobile_number);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, abs($bill_item->ceiling_amount - $bill_item->usage_amount));
                $row++;
            }
//            $row++;

        }

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $filename = 'bills_' . date('Y_m_d_H_i_s');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        set_time_limit(120);
        ini_set('memory_limit', '256M');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_end_clean();
        return $objWriter->save('php://output');
    }

    public function company_wise_pdf($company_id = null, $year = null, $month = null)
    {
        //$this->sma->checkPermissions();

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }

        $footer = ' <table width="100%">
        <tr>
            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="text-transform: capitalize;">

                    <p style="border-top: 1px solid #000;">Prepared By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Checked By</p>
                </div>
            </td>


            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Verified By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Approved By</p>
                </div>
            </td>

        </tr>
    </table>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $info = $this->employees_model->getAllBillDetails($bill_id);
        $this->data['id'] = $bill_id;
        $this->data['rows'] = $info;
        $this->data['supplier'] = $this->employees_model->getOperatorByID($info[0]->operator_id);
//        $this->data['warehouse'] = $this->site->getWarehouseByID(1);
        $name = $this->lang->line("bills") . "_" . str_replace('/', '_', $bill_id) . ".pdf";
        $html = $this->load->view($this->theme . 'employees/pdf', $this->data, true);
        if (!$this->Settings->barcode_img) {
            $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
        }
        if ($view) {
            $this->load->view($this->theme . 'employees/pdf', $this->data);
        } elseif ($save_bufffer) {
            return $this->sma->generate_pdf($html, $name, $save_bufffer);
        } else {
            $this->sma->generate_pdf($html, $name, null, $footer);
        }

    }


    function index_payment()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-index_payment'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('index_payment')));
        $meta = array('page_title' => lang('index_payment'), 'bc' => $bc);
        $this->page_construct('employees/payments', $meta, $this->data);
    }

    function getPayments()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-index_payment'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $edit_link = "";
        $delete_link = "";
        if ($get_permission['employees-edit_employee_payment'] || $this->Owner || $this->Admin) $edit_link = anchor('employees/edit_employee_payment/$1', '<i class="fa fa-edit"></i> ' . lang('edit_employee_payment'), 'class="sledit"');
        if ($get_permission['employees-delete_employee_payment'] || $this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete_employee_payment") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('employees/delete_employee_payment/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_employee_payment') . "</a>";
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
            ->select("employees_payment.id as id,employees_payment.employee_id as employee_ids,employees.name as nam,company.name as c_name,bank_name,bank_account,gross_salary,payment_payroll as payment_payroll,payment_other,employees.active as actives")
            ->from("employees_payment")
            ->join('employees', 'employees_payment.employee_id=employees.employee_id', 'inner')
            ->join('company', 'employees.company_id=company.id', 'left')
            ->group_by('employees_payment.id')
//            ->edit_column('active', '$1__$2', 'active, id')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }


    function add_employee_payment()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-add_employee_payment'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['title'] = "Add Employee payment";
        $this->form_validation->set_rules('employee_id', lang("employee_id"), 'trim|required|is_unique[employees_payment.employee_id]');
        $this->form_validation->set_rules('payment_payroll', lang("payment_payroll"), 'trim|required');
        $this->form_validation->set_rules('gross_salary', lang("gross_salary"), 'trim|required');
        $this->form_validation->set_rules('payment_other', lang("payment_other"), 'trim|required');
        $this->form_validation->set_rules('bank_name', lang("bank_name"), 'trim|required');
        $this->form_validation->set_rules('bank_account', lang("bank_account"), 'trim|required');
        $this->form_validation->set_rules('active', lang("active"), 'trim|required');

        if ($this->form_validation->run() == true) {
            $gross_salary = $this->input->post('gross_salary');
            $payment_other = $this->input->post('payment_other');
            $payment_payroll = $this->input->post('payment_payroll');

            if ($gross_salary != ($payment_other + $payment_payroll)) {
                $this->session->set_flashdata('error', lang("gross_amount_error"));
                redirect($_SERVER["HTTP_REFERER"]);
            }

            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'payment_payroll' => $this->input->post('payment_payroll'),
                'gross_salary' => $this->input->post('gross_salary'),
                'payment_other' => $this->input->post('payment_other'),
                'bank_account' => $this->input->post('bank_account'),
                'bank_name' => $this->input->post('bank_name'),
                'active' => $this->input->post('active'),
                'created_by' => $this->session->userdata('user_id'),
                'created_date' => date("Y-m-d h:i:sa")
            );
        }

        if ($this->form_validation->run() == true && $this->employees_model->addEmployeePayment($data)) {
            $this->session->set_flashdata('message', lang("employee_payment_added"));
            redirect("employees/index_payment");

        } else {
            $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
            $this->data['employees'] = $this->employees_model->getAllEmployees();
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('employees/add_employee_payment'), 'page' => lang('employee')), array('link' => '#', 'page' => lang('add_employee_payment')));
            $meta = array('page_title' => lang('add_employee_payment'), 'bc' => $bc);
            $this->page_construct('employees/add_payment', $meta, $this->data);
        }
    }

    function edit_employee_payment($id = NULL)
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-edit_employee_payment'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $this->data['title'] = lang("edit_employee_payment");

        $this->data['title'] = "Edit Employee Payment";
        $this->form_validation->set_rules('employee_id', lang("employee_id"), 'trim|required');
        $this->form_validation->set_rules('payment_payroll', lang("payment_payroll"), 'trim|required');
        $this->form_validation->set_rules('gross_salary', lang("gross_salary"), 'trim|required');
        $this->form_validation->set_rules('payment_other', lang("payment_other"), 'trim|required');
        $this->form_validation->set_rules('bank_name', lang("bank_name"), 'trim|required');
        $this->form_validation->set_rules('bank_account', lang("bank_account"), 'trim|required');
        $this->form_validation->set_rules('active', lang("active"), 'trim|required');


        if ($this->form_validation->run() == true) {

            $gross_salary = $this->input->post('gross_salary');
            $payment_other = $this->input->post('payment_other');
            $payment_payroll = $this->input->post('payment_payroll');

            if ($gross_salary != ($payment_other + $payment_payroll)) {
                $this->session->set_flashdata('error', lang("gross_amount_error"));
                redirect($_SERVER["HTTP_REFERER"]);
            }

            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'payment_payroll' => $this->input->post('payment_payroll'),
                'gross_salary' => $this->input->post('gross_salary'),
                'payment_other' => $this->input->post('payment_other'),
                'bank_account' => $this->input->post('bank_account'),
                'bank_name' => $this->input->post('bank_name'),
                'active' => $this->input->post('active'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_date' => date("Y-m-d h:i:sa")
            );
        }
        if ($this->form_validation->run() == true && $this->employees_model->updateEmployeePayment($id, $data)) {
            $this->session->set_flashdata('message', lang("employee_payment_edited"));
            redirect("employees/index_payment");

        } else {
            $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
            $this->data['employees'] = $this->employees_model->getAllEmployees();
            $this->data['employee_payment'] = $this->employees_model->getEmployeePaymentById($id);
            $bc = array(array('link' => site_url('home'), 'page' => lang('home')), array('link' => site_url('employees/edit_employee_payment'), 'page' => lang('employee')), array('link' => '#', 'page' => lang('add_employee_payment')));
            $meta = array('page_title' => lang('edit_employee_payment'), 'bc' => $bc);
            $this->page_construct('employees/edit_payment', $meta, $this->data);
        }
    }

    function delete_employee_payment($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-edit_employee_payment'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->employees_model->deletePayment($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("employee_payment_delete");
                die();
            }
            $this->session->set_flashdata('message', lang('employee_payment_delete'));
            redirect('employees/index_payment');
        }


    }


    function employees_payment_actions()
    {
        if (!$this->Owner && !$this->GP['bulk_actions']) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'export_excel' || $this->input->post('form_action') == 'export_pdf') {

                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle('Employees_Payment');
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('employee_id'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('name'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('company_name'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('bank_name'));
                    $this->excel->getActiveSheet()->SetCellValue('E1', lang('bank_account'));
                    $this->excel->getActiveSheet()->SetCellValue('F1', lang('gross_salary'));
                    $this->excel->getActiveSheet()->SetCellValue('G1', lang('payment_payroll'));
                    $this->excel->getActiveSheet()->SetCellValue('H1', lang('payment_other'));
                    $this->excel->getActiveSheet()->SetCellValue('I1', lang('status'));
//
                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $employees = $this->employees_model->getEmployeePaymentsById($id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $employees->employee_id);
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $employees->nam);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $employees->c_name);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $employees->bank_name);
                        $this->excel->getActiveSheet()->SetCellValue('E' . $row, $employees->bank_account);
                        $this->excel->getActiveSheet()->SetCellValue('F' . $row, $employees->gross_salary);
                        $this->excel->getActiveSheet()->SetCellValue('G' . $row, $employees->payment_payroll);
                        $this->excel->getActiveSheet()->SetCellValue('H' . $row, $employees->payment_other);
                        $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($employees->active == '1' ? 'Active' :'Inactive'));
                        $row++;
                    }

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
                    $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
                    $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'employees_payment_' . date('Y_m_d_H_i_s');
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

    public function salary_process()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-salary_process'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');
        $this->form_validation->set_message('is_natural_no_zero', lang("no_zero_required"));
        $this->form_validation->set_rules('year', lang("year"), 'trim|required');
        $this->form_validation->set_rules('month', lang("month"), 'trim|required');
        $this->form_validation->set_rules('start_date', lang("start_date"), 'trim|required');
        $this->form_validation->set_rules('end_date', lang("end_date"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $month = $this->input->post('month');
            $year = $this->input->post('year');
            $start_date = $this->sma->fsd($this->input->post('start_date'));
            $end_date = $this->sma->fsd($this->input->post('end_date'));

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');

                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("employees/salary_process");
                }

                $csv = $this->upload->file_name;
                $data['attachment'] = $csv;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);

                $keys = array('employee_id', 'absent_days','holiday_allowance_hours');
                $final = array();
                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }
                $rw = 2;

                foreach ($final as $csv_pr) {
                    $bill_details = $this->employees_model->getSalaryByMonthAndYear($month, $year,$csv_pr['employee_id']);
                    if ($bill_details) {
                        $this->session->set_flashdata('error', lang("salary_already_exist"));
                        redirect($_SERVER["HTTP_REFERER"]);
                    }
                    $holiday_allowance_gross=0;
                    $holiday_allowance_other=0;
                    $holiday_allowance_gross=0;
                    $holiday_allowance_other=0;
                    if (isset($csv_pr['employee_id'])) {
                        $employee_details = $this->employees_model->getPaymentById($csv_pr['employee_id']);
                        if ($employee_details) {
                            $absent_days = (float)$csv_pr['absent_days'];
                            $holiday_allowance = (float)$csv_pr['holiday_allowance_hours'];
                            if (isset($csv_pr['absent_days'])) {
                                $absent_deduction_gross=(($employee_details->gross_salary/30)*$absent_days);
                                $absent_deduction_other=(($employee_details->payment_other/30)*$absent_days);

                            }

                            if (isset($csv_pr['holiday_allowance_hours'])) {
                                $daily_amount_gross=($employee_details->gross_salary/30);
                                $daily_amount_other=($employee_details->payment_other/30);
                                $holiday_allowance_gross=(($daily_amount_gross/8)*$holiday_allowance);
                                $holiday_allowance_other=(($daily_amount_other/8)*$holiday_allowance);
                            }
                            $salary[] = array(
                                'employee_id' => $employee_details->employee_id,
                                'reference_no' => ($year . "_" . $month ),
                                'year' => $year,
                                'month' => $month,
                                'start_date' => $start_date,
                                'end_date' => $end_date,
                                'payment_payroll' => $employee_details->payment_payroll,
                                'payment_other' => $employee_details->payment_other,
                                'gross_salary' => $employee_details->gross_salary,
                                'absent_days' => $absent_days,
                                'holiday_allowance' => $holiday_allowance,
                                'gross_absent_deduction' => $daily_amount_gross,
                                'payment_other_absent_deduction' => $daily_amount_other,
                                'payment_other_holiday_allowance' => $holiday_allowance_other,
                                'gross_holiday_allowance' => $holiday_allowance_gross,
                                'created_by' => $this->session->userdata('user_id'),
                                'created_date' => date("Y-m-d h:i:sa"),
                            );



                        }
                        // csv data check

                    }
                }

            }
        }


        if ($this->form_validation->run() == true && $this->employees_model->addSalary($salary)) {
            $this->session->set_flashdata('message', lang("salary_added"));
            redirect("employees/list_month_salary");
        } else {
            $data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees'), 'page' => lang('employees')), array('link' => '#', 'page' => lang('salary_process')));
            $meta = array('page_title' => lang('add_employee_by_csv'), 'bc' => $bc);
            $this->page_construct('employees/salary_process', $meta, $this->data);

        }
    }


    function list_month_salary()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-list_month_salary'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees'), 'page' => lang('employees')), array('link' => '#', 'page' => lang('list_month_salary')));
        $meta = array('page_title' => lang('list_month_salary'), 'bc' => $bc);
        $this->page_construct('employees/list_month_salary', $meta, $this->data);
    }

    function get_month_salary()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-list_month_salary'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }
        if ($this->Owner || $this->Admin) $delete_link = "<a href='#' class='po' title='<b>" . lang("delete_salary") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('employees/delete_salary/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_salary') . "</a>";
        $detail_link = anchor('employees/salary_details/$1', '<i class="fa fa-file-text-o"></i> ' . lang('salary_details'));
        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $detail_link . '</li>
            <li>' . $delete_link . '</li>
        </ul>
    </div></div>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('salary') . ".reference_no as id, " . $this->db->dbprefix('salary') . ".month as op_name," . $this->db->dbprefix('salary') . ".year as pa_name,sum(" . $this->db->dbprefix('salary') . ".payment_other) as c_amount,round(sum(" . $this->db->dbprefix('salary') . ".payment_other_absent_deduction),2) as u_amount,round(sum(" . $this->db->dbprefix('salary') . ".payment_other_holiday_allowance),2) as b_amount")
            ->from("salary")
            ->group_by('salary.month')
            ->group_by('salary.year')
            ->group_by('salary.reference_no')
            ->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function salary_details($salary_id = null)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-list_month_salary'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $salary_id = $this->input->get('id');
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $info = $this->employees_model->getAllSalaryDetails($salary_id);
        $this->data['id'] = $salary_id;
        $this->data['rows'] = $info;
        $this->data['warehouse'] = $this->site->getWarehouseByID(1);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('employees/salary_details'), 'page' => lang('salary_details')));
        $meta = array('page_title' => lang('salary_details'), 'bc' => $bc);
        $this->page_construct('employees/salary_details', $meta, $this->data);

    }

    public function salary_details_pdf($bill_id = null, $view = null, $save_bufffer = null)
    {
        //$this->sma->checkPermissions();
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['employees-list_month_salary'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        if ($this->input->get('id')) {
            $bill_id = $this->input->get('id');
        }


        $footer = ' <table width="100%">
        <tr>
            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="text-transform: capitalize;">

                    <p style="border-top: 1px solid #000;">Prepared By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">
                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Checked By</p>
                </div>
            </td>


            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Verified By</p>
                </div>
            </td>

            <td style="width:23%; text-align:center">

                <div style="float:left; margin:5px 15px">
                    <p>&nbsp;</p>

                    <p style="border-top: 1px solid #000;">Approved By</p>
                </div>
            </td>

        </tr>
    </table>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $info = $this->employees_model->getAllSalaryDetails($bill_id);
        $this->data['id'] = $bill_id;
        $this->data['rows'] = $info;
        $this->data['warehouse'] = $this->site->getWarehouseByID(1);
        $name = $this->lang->line("salary_details") . "_" . str_replace('/', '_', $bill_id) . ".pdf";
        $html = $this->load->view($this->theme . 'employees/salary_details_pdf', $this->data, true);
        if (!$this->Settings->barcode_img) {
            $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
        }
        if ($view) {
            $this->load->view($this->theme . 'employees/salary_details_pdf', $this->data);
        } elseif ($save_bufffer) {
            return $this->sma->generate_pdf($html, $name, $save_bufffer);
        } else {
            $this->sma->generate_pdf($html, $name, null, $footer);
        }

    }

    function delete_salary($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->employees_model->deleteSalary($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("salary_deleted");
                die();
            }
            $this->session->set_flashdata('message', lang('salary_deleted'));
            redirect('employees/list_month_salary');
        }
    }


}