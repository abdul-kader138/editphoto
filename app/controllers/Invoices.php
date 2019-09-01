<?php
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 28-Jul-19
 * Time: 11:11 AM
 */

class Invoices extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->load('sma', $this->Settings->user_language);
        $this->permission_details = $this->site->checkPermissions();
        $this->load->library('form_validation');
        $this->load->model('invoices_model');
    }


    function index()
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['invoices-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Invoices')));
        $meta = array('page_title' => lang('Invoices'), 'bc' => $bc);
        $this->page_construct('invoices/index', $meta, $this->data);
    }

    function getInvoices()
    {
        $current_users = $this->site->getUsersByID($this->session->userdata('user_id'));
        $delete_link = "<a href='#' class='po' title='<b>" . lang("delete") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . site_url('invoices/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete') . "</a>";
        if ($this->Owner || $this->Admin)  $payment_link = anchor('invoices/update_status/$1', '<i class="fa fa-dollar"></i> ' . lang('Update_Status'),'data-toggle="modal" data-target="#myModal"');
        if ($delete_link || $payment_link) {
            $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . lang('actions') . ' <span class="caret"></span></button>
                     
        <ul class="dropdown-menu pull-right" role="menu">
            <li>' . $delete_link . '</li>
            <li>' . $payment_link . '</li>
        </ul>
    </div></div>';
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('invoices') . ".reference_no as ids, " . $this->db->dbprefix('invoices') . ".reference_no," . $this->db->dbprefix('invoices') . ".customer_name,sum(" . $this->db->dbprefix('invoices') . ".qty) as quantity,sum(" . $this->db->dbprefix('invoices') . ".total_tax) as t_tax,sum(" . $this->db->dbprefix('invoices') . ".total_val) as amt," . $this->db->dbprefix('invoices') . ".payment_status,". $this->db->dbprefix('invoices') . ".note," . $this->db->dbprefix('invoices') . ".created_date", false)
            ->from("invoices")
            ->group_by('invoices.reference_no');
        if (!$this->Owner && !$this->Admin && $current_users->view_right == '0') {
            $this->datatables->where('invoices.created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->add_column("Actions", $action, "ids");
        echo $this->datatables->generate();
    }

    public function add()
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['invoices-add'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->form_validation->set_rules('customer_id', $this->lang->line("Customer_Name"), 'trim|required');
        $this->form_validation->set_rules('due_date', $this->lang->line("Due_Date"), 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line("note"), 'trim');
        if ($this->form_validation->run() == true) {
            $customer = $this->site->getUsersByID($_POST['customer_id']);
            $i = isset($_POST['orderDate']) ? sizeof($_POST['orderDate']) : 0;
            $ref_no = date('Y') . date('m') . date('d') . rand(1, 99999);
            $gt_qty=0;
            $gt_amount=0;
            for ($r = 0; $r < $i; $r++) {
                $order_date = isset($_POST['orderDate'][$r]) ? $this->sma->fsd($_POST['orderDate'][$r]) : null;
                $service_id = $_POST['service_id'][$r];
                $service_type = $this->site->getServiceTypeByID($service_id);
                $complexity_id = $_POST['complexity_id'][$r];
                $complexity_type = $this->site->getComplexityTypeByID($complexity_id);
                $addOns_id = $_POST['addOns_id'][$r];
                $addOns_type = $this->site->getAddOnsByID($addOns_id);
                $deliveryFormat_id = $_POST['deliveryFormat_id'][$r];
                $deliveryFormat_type = $this->site->getDeliveryFormatByID($deliveryFormat_id);
                $deliveryCost_id = $_POST['deliveryCost_id'][$r];
                $deliveryCost_type = $this->site->getDeliveryTimeCostByID($deliveryCost_id);
                $order_qty = $_POST['menu_quantity'][$r];
                $tax = $this->Settings->tax;
                $complexity_type_val = (($complexity_type ? $complexity_type->price : 0) * $order_qty);
                $addOns_type_val = (($addOns_type ? $addOns_type->price : 0) * $order_qty);
                $deliveryCost_type_val = (($deliveryCost_type ? $deliveryCost_type->price : 0) * $order_qty);
                $actual_val = $order_qty * $_POST['ord_price'][$r];
                $total_val = ($actual_val + $complexity_type_val + $addOns_type_val + $deliveryCost_type_val);
                $total_tax = ($total_val * $tax) / 100;
                $product = array(
                    'order_date' => $order_date,
                    'reference_no' => $ref_no,
                    'service_id' => $service_id,
                    'service_name' => ($service_type ? $service_type->name : ''),
                    'complexity_id' => $complexity_id,
                    'complexity_name' => ($complexity_type ? $complexity_type->name : ''),
                    'complexity_price' => ($complexity_type ? $complexity_type->price : 0),
                    'complexity_val' => $complexity_type_val,
                    'addOns_id' => $addOns_id,
                    'addOns_name' => ($addOns_type ? $addOns_type->name : ''),
                    'addOns_price' => ($addOns_type ? $addOns_type->price : 0),
                    'addOns_val' => $addOns_type_val,
                    'deliveryFormat_id' => $deliveryFormat_id,
                    'deliveryFormat_name' => ($deliveryFormat_type ? $deliveryFormat_type->name : ''),
                    'deliveryCost_id' => $deliveryCost_id,
                    'deliveryCost_name' => ($deliveryCost_type ? $deliveryCost_type->name : ''),
                    'deliveryCost_price' => ($deliveryCost_type ? $deliveryCost_type->price : 0),
                    'deliveryCost_val' => $deliveryCost_type_val,
                    'created_by' => $this->session->userdata('user_id'),
                    'created_date' => date("Y-m-d H:i:s"),
                    'rate' => $_POST['ord_price'][$r],
                    'tax' => $tax,
                    'total_val' => $total_val,
                    'due_date' => $this->sma->fsd($_POST['due_date']),
                    'total_tax' => $total_tax,
                    'payment_status' => 'Pending',
                    'customer_name' => $customer->first_name . " " . $customer->last_name,
                    'customer_id' => $_POST['customer_id'],
                    'note' => $this->sma->clear_tags($this->input->post('note')),
                    'qty' => $order_qty,
                    'folder_info' => $_POST['folder_info'][$r]
                );

                $products[] = $product;
                $gt_qty=$gt_qty+$order_qty;
                $gt_amount=$gt_amount+($total_val+$total_tax);
            }
        }
        if (empty($products)) {
            $this->form_validation->set_rules('product', lang("order_items"), 'required');
        } else {
            krsort($products);
        }


        if ($this->form_validation->run() == true && $this->invoices_model->invoiceBatch($products)) {
            $this->load->library('parser');
            $parse_data = array(
                'reference_number' => $ref_no,
                'customer' => $customer->first_name . " " . $customer->last_name,
                'company' => $this->Settings->site_name,
                'site_link' => base_url(),
                'site_name' => $this->Settings->site_name,
                'logo' => '<img src="' . base_url('assets/uploads/logos/' . $this->Settings->logo) . '" alt="' . $this->Settings->site_name . '"/>'
            );

            $msg = file_get_contents('./themes/' . $this->theme . 'email_templates/sale.html');
            $message = $this->parser->parse_string($msg, $parse_data);

            $btn_code = '<div id="payment_buttons" class="text-center margin010">';
            $btn_code .= '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=' . $customer->email . '&item_name=' . $ref_no . '&item_number=' . $gt_qty . '&image_url=' . base_url() . 'assets/uploads/logos/' . $this->Settings->logo . '&amount=' .$gt_amount . '&no_shipping=1&no_note=1&currency_code=USD&bn=FC-BuyNow&rm=2&return=' . site_url('invoices') . '&cancel_return=' . site_url('invoices') . '&notify_url=' . site_url('payments/paypalipn') . '&custom=' . $ref_no . '__' . $gt_amount. '"><img src="' . base_url('assets/images/btn-paypal.png') . '" alt="Pay by PayPal"></a> ';
            $btn_code .= '<div class="clearfix"></div></div>';
            $message = $message . $btn_code;
            $attachment = $this->pdf($ref_no, null, 'S');

            if ($this->sma->send_email($customer->email, 'Invoice Created- Inv No:' . $ref_no, $message, $this->Settings->default_email, $this->Settings->site_name,$attachment)) {
                $this->session->set_flashdata('message', lang('Info_Updated_Successfully'));
                redirect('invoices');
            } else {
                $this->session->set_flashdata('message', lang('Info_Updated_Successfully_But_Email_Not Sent'));
                redirect('invoices');
            }

        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => site_url('invoices'), 'page' => lang('Invoices')), array('link' => '#', 'page' => lang('Add')));
            $meta = array('page_title' => lang('Add_Invoices'), 'bc' => $bc);
            $this->data['users'] = $this->site->getAllUsersById();
            $this->page_construct('invoices/add', $meta, $this->data);
        }
    }


    function invoices_group($id = NULL, $due_date = null)
    {

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['id'] = $id;
        $this->data['due_date'] = $due_date;
        $this->data['users'] = $this->site->getAllUser();
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('Invoices')));
        $meta = array('page_title' => lang('Invoices_Group'), 'bc' => $bc);
        $this->page_construct('invoices/invoices_group', $meta, $this->data);
    }


    function getServiceType()
    {
        $row = true;
        if ($row) $row = $this->invoices_model->getServiceType();
        $this->sma->send_json($row);
    }

    function getComplexityType()
    {
        $row = true;
        if ($row) $row = $this->invoices_model->getComplexityType();
        $this->sma->send_json($row);
    }


    function getAddOnsType()
    {
        $row = true;
        if ($row) $row = $this->invoices_model->getAddOnsType();
        $this->sma->send_json($row);
    }

    function getDeliveryFormatType()
    {
        $row = true;
        if ($row) $row = $this->invoices_model->getDeliveryFormatType();
        $this->sma->send_json($row);
    }

    function getDeliveryCostType()
    {
        $row = true;
        if ($row) $row = $this->invoices_model->getDeliveryCostType();
        $this->sma->send_json($row);
    }


    function modal_view($id = NULL)
    {

        $pr_details = $this->invoices_model->getInvoicesById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Invoice_Not_Found'));
            $this->sma->md();
        }
        $this->data['inv'] = $pr_details;
        $this->data['users'] = $this->site->getUsersByID($pr_details[0]->created_by);
        $this->load->view($this->theme . 'invoices/modal_view', $this->data);
    }

    public function pdf($id = null, $view = null, $save_bufffer = null)
    {
        //$this->sma->checkPermissions();

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $footer = ' <hr><p style="text-align:center;font-size: 11px;" >Printed Date & Time: ' . date("Y-m-d h:i:sa") . '</p>';
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $pr_details = $this->invoices_model->getInvoicesById($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('Invoice_Not_Found'));
            $this->sma->md();
        }
        $this->data['inv'] = $pr_details;
        $this->data['users'] = $this->site->getUsersByID($pr_details[0]->created_by);
        $this->load->view($this->theme . 'invoices/inv_pdf', $this->data);
        $name = $this->lang->line("invoice") . "_" . str_replace('/', '_', $id) . ".pdf";
        $html = $this->load->view($this->theme . 'invoices/inv_pdf', $this->data, true);
        if ($view) {
            $this->load->view($this->theme . 'invoices/inv_pdf', $this->data);
        } elseif ($save_bufffer) {
            return $this->sma->generate_pdf($html, $name, $save_bufffer);
        } else {
            $this->sma->generate_pdf($html, $name, null, $footer);
        }

    }

    function delete($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['invoices-delete'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->invoices_model->delete($id)) {
            if ($this->input->is_ajax_request()) {
                echo lang("Info_Deleted_Successfully");
                die();
            }
            $this->session->set_flashdata('message', lang('Info_Deleted_Successfully'));
            redirect('invoices/index');
        }
    }


    public function update_status($id)
    {

        $this->form_validation->set_rules('status', lang("payment_status"), 'required');

        if ($this->form_validation->run() == true) {
            $payment_status = $this->input->post('status');
            $note = $this->sma->clear_tags($this->input->post('note'));
        } elseif ($this->input->post('update')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'invoices');
        }

        if ($this->form_validation->run() == true && $this->invoices_model->updateStatus($id, $payment_status, $note)) {
            $this->session->set_flashdata('message', lang('status_updated'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'invoices');
        } else {

            $this->data['inv'] = $this->invoices_model->getInvoicesById($id);
            $this->data['modal_js'] = $this->site->modal_js();
            $this->load->view($this->theme.'invoices/update_status', $this->data);

        }
    }

}