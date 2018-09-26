<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Snatch_assets extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_homes_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'วิ่งราวชิงทรัพย์';
    private $head_sub_topic_label_table = 'รายการวิ่งราวชิงทรัพย์';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล วิ่งราวชิงทรัพย์';
    private $header_columns             = array('วันที่', 'ชื่อ - สกุล', 'สถานที่เกิดเหตุ', 'ทรัพย์สินที่เสียหาย', 'หมายเหตุ', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('snatch_assets/form_store');
        $data['link_go_to_remove'] = site_url('snatch_assets/remove');
        $data['header_columns'] = $this->header_columns;

        // $qstr = array('status !=' => 'disabled');
        // $results = $this->Break_homes_model->all($qstr);
        // $data['results'] = $results['results'];
        $data['results'] = array();
        $data['content'] = 'break_homes_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        // $id = $this->uri->segment(3);

        // $data = $this->find($id);
        $data['period_time'] = '';
        $data['people_type'] = '';
        $data['owner_assets_department'] = '';
        $data['snatch_events'] = '';
        $data['snatch_events_other'] = '';
        $data['arrested_status_other'] = '';
        
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('snatch_assets');
        $data['form_submit_data_url'] = site_url('snatch_assets/store');

        $data['content'] = 'snatch_assets_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inptus = $this->input->post();
        $inptus['date_break'] = $this->date_libs->set_date_th($inptus['date_break']);
        $results = $this->Break_homes_model->store($inptus);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('snatch_assets');
    }

    private function find($id = 0)
    {
        $results = $this->Break_homes_model->find($id);
        $values = $results['results'];
        $fields = $results['fields'];
        $rows = $results['rows'];
        $data = array();

        foreach ($fields as $key => $value)
        {
            if ($rows <= 0)
            {
                $data[$value] = '';
            }
            else
            {
                $data[$value] = $values->$value;
            }
        }

        return $data;
    }

    public function remove()
    {
        $id = $this->uri->segment(3);
        $results = $this->Break_homes_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('snatch_assets');
    }
}
