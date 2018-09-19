<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Redbox_security_only extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Redbox_inspect_transaction_model');
        $this->load->model('Redbox_place_model');

        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'จุดตรวจตู้แดง ';
    private $head_sub_topic_label_table = 'รายการ จุดตรวจตู้แดง ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล จุดตรวจตู้แดง ';
    private $header_columns             = array('ชื่อ - สกุล', 'โซน', 'ชื่อตู้แดง', 'วันที่บันทึก', 'เวลา', 'สถานะ', 'หมายเหตุ', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';


    public function form_store()
    {
        $qstr_redbox_place = array('status' => 'active');
        $results_redbox_place = $this->Redbox_place_model->all($qstr_redbox_place);
        $data['results_redbox_place'] = $results_redbox_place['results'];

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('redbox');
        $data['form_submit_data_url'] = site_url('redbox_security_only/store');
        $data['permission'] = $sess_data['permission'];

        $data['content'] = 'redbox_only_security_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout_evaluation', $data);
    }

    public function store()
    {
        $sess_data = $this->session->userdata();
        $inputs = $this->input->post();
        $inputs['inspect_date'] = date('Y-m-d H:i:s');

        // echo "<pre>", print_r($inputs); exit();
        // $results = $this->Redbox_inspect_transaction_model->store($inputs);

        // $alert_type = ($results['query'] ? 'success' : 'warning');
        // $alert_icon = ($results['query'] ? 'check' : 'warning');
        // $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        // $this->session->set_flashdata('alert_type', $alert_type);
        // $this->session->set_flashdata('alert_icon', $alert_icon);
        // $this->session->set_flashdata('alert_message', $alert_message);

        // redirect('redbox_security_only/form_store');
    }
}
