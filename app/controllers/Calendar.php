<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->permission_details = $this->site->checkPermissions();

        $this->load->library('form_validation');
        $this->load->model('calendar_model');
    }

    public function index()
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['calendar-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }

        $this->data['cal_lang'] = $this->get_cal_lang();
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('calendar')));
        $meta = array('page_title' => lang('calendar'), 'bc' => $bc);
        $this->page_construct('calendar', $meta, $this->data);
    }

    public function get_events()
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['calendar-index'])) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                redirect($_SERVER["HTTP_REFERER"]);
            }
        }


        $cal_lang = $this->get_cal_lang();
        $this->load->library('fc', array('lang' => $cal_lang));

        if (!isset($_GET['start']) || !isset($_GET['end'])) {
            die("Please provide a date range.");
        }

        if ($cal_lang == 'ar') {
            $start = $this->fc->convert2($this->input->get('start', true));
            $end = $this->fc->convert2($this->input->get('end', true));
        } else {
            $start = $this->input->get('start', true);
            $end = $this->input->get('end', true);
        }

        $input_arrays = $this->calendar_model->getEvents($start, $end);
        $start = $this->fc->parseDateTime($start);
        $end = $this->fc->parseDateTime($end);
        $output_arrays = array();
        foreach ($input_arrays as $array) {
            $this->fc->load_event($array);
            if ($this->fc->isWithinDayRange($start, $end)) {
                $output_arrays[] = $this->fc->toArray();
            }
        }

        // $this->sma->send_json($output_arrays);
        $this->sma->send_json($output_arrays);
    }

    public function add_event()
    {

        if (!$this->Owner && !$this->Admin) {
            $get_permission = $this->permission_details[0];
            if ((!$get_permission['calendar-add'])) {
                die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                $res = array('error' => 1, 'msg' => lang('action_failed'));
                $this->sma->send_json($res);
            }
        }

        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('start', lang("start"), 'required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'title' => $this->input->post('title'),
                'start' => $this->sma->fld($this->input->post('start')),
                'end' => $this->input->post('end') ? $this->sma->fld($this->input->post('end')) : NULL,
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color') ? $this->input->post('color') : '#000000',
                'user_id' => $this->session->userdata('user_id')
            );
            if ($this->calendar_model->addEvent($data)) {
                $res = array('error' => 0, 'msg' => lang('event_added'));
                $this->sma->send_json($res);

            } else {
                $res = array('error' => 1, 'msg' => lang('action_failed'));
                $this->sma->send_json($res);
            }
        }

    }

    public function update_event()
    {

        $this->form_validation->set_rules('title', lang("title"), 'trim|required');
        $this->form_validation->set_rules('start', lang("start"), 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            if ($event = $this->calendar_model->getEventByID($id)) {

                if (!$this->Owner && !$this->Admin) {
                    $get_permission = $this->permission_details[0];
                    if ((!$get_permission['calendar-edit'])) {
                        die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                        $res = array('error' => 1, 'msg' => lang('action_failed'));
                        $this->sma->send_json($res);

                    }
                }
            }
            $data = array(
                'title' => $this->input->post('title'),
                'start' => $this->sma->fld($this->input->post('start')),
                'end' => $this->input->post('end') ? $this->sma->fld($this->input->post('end')) : NULL,
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color') ? $this->input->post('color') : '#000000',
                'user_id' => $this->session->userdata('user_id')
            );

            if ($this->calendar_model->updateEvent($id, $data)) {
                $res = array('error' => 0, 'msg' => lang('event_updated'));
                $this->sma->send_json($res);
            } else {
                $res = array('error' => 1, 'msg' => lang('action_failed'));
                $this->sma->send_json($res);
            }
        }

    }

    public function delete_event($id)
    {
        if ($this->input->is_ajax_request()) {
            if ($event = $this->calendar_model->getEventByID($id)) {
                if (!$this->Owner && !$this->Admin) {
                    $get_permission = $this->permission_details[0];
                    if ((!$get_permission['calendar-delete'])) {
                        die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : site_url('welcome')) . "'; }, 10);</script>");
                        $res = array('error' => 1, 'msg' => lang('action_failed'));
                        $this->sma->send_json($res);
                    }
                }
                $this->db->delete('calendar', array('id' => $id));
                $res = array('error' => 0, 'msg' => lang('event_deleted'));
                $this->sma->send_json($res);
            }
        }
    }

    public function get_cal_lang()
    {
        switch ($this->Settings->user_language) {
            case 'arabic':
                $cal_lang = 'ar-ma';
                break;
            case 'spanish':
                $cal_lang = 'es';
                break;
            case 'german':
                $cal_lang = 'de';
                break;
            case 'thai':
                $cal_lang = 'th';
                break;
            case 'vietnamese':
                $cal_lang = 'vi';
                break;
            case 'italian':
                $cal_lang = 'it';
                break;
            case 'simplified-chinese':
                $cal_lang = 'zh-tw';
                break;
            case 'traditional-chinese':
                $cal_lang = 'zh-cn';
                break;
            case 'turkish':
                $cal_lang = 'tr';
                break;
            default:
                $cal_lang = 'en';
                break;
        }
        return $cal_lang;
    }

}
