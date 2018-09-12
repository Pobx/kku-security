<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_redboxs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Redbox_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติกล่องแดง';
    private $head_sub_topic_label_table = 'รายงาน สถิติกล่องแดง';
    private $header_columns             = array('ลำดับ', 'ชื่อ - สกุล', 'โซน', 'ชื่อตู้แดง', 'วันที่บันทึก', 'เวลา', 'สถานะ', 'หมายเหตุ');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] = (isset($inputs['start_date']) ? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] = (isset($inputs['end_date']) ? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] = site_url('report_redboxs');
        $data['link_excel'] = site_url('report_security_home/export_excel');

        $qstr = array(
            'DATE(checked_datetime) >=' => $this->date_libs->set_date_th($data['start_date']),
            'DATE(checked_datetime) <='   => $this->date_libs->set_date_th($data['end_date']),
            'status !='     => 'disabled',
        );

        $sess_inputs = array(
            'start_date' => $this->date_libs->set_date_th($data['start_date']),
            'end_date'   => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Security_home_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'start_date_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_security_home_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel()
    {
        $data['header_columns'] = $this->header_columns;
        $inputs = $this->session->userdata();
        $qstr = array(
            'start_date >=' => $inputs['start_date'],
            'end_date <='   => $inputs['end_date'],
            'status !='     => 'disabled',
        );

        $results = $this->Security_home_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_security_home_table', $data);

    }

}
