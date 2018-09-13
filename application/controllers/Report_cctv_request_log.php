<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_cctv_request_log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cctv_request_log_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สถิติขอความอนุเคราะห์ดูภาพเหตุการณ์';
    private $head_sub_topic_label_table = 'รายงาน สถิติขอความอนุเคราะห์ดูภาพเหตุการณ์';
    private $header_columns             = array('วันที่', 'ประเภทบุคลากร', 'เหตุการณ์', 'สำเนาบันทึกแจ้งความประจำวัน', 'สำเนาบัตรประจำตัวนักศึกษา/สำเนาบัตรประชาชน/สำเนาบัตรข้าราชการ	', 'สำเนาบัตรอื่นๆ ที่หน่วยงานราชการออกให้');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] = (isset($inputs['start_date']) ? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] = (isset($inputs['end_date']) ? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] = site_url('report_cctv_request_log');
        $data['link_excel'] = site_url('report_cctv_request_log/export_excel');

        $qstr = array(
            'DATE(cctv_request_log.request_date) >='  => $this->date_libs->set_date_th($data['start_date']),
            'DATE(cctv_request_log.request_date) <='  => $this->date_libs->set_date_th($data['end_date']),
            'cctv_request_log.status !=' => 'disabled',
        );

        $sess_inputs = array(
            'start_date' => $this->date_libs->set_date_th($data['start_date']),
            'end_date'   => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Cctv_request_log_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'request_date');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_cctv_request_log_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel()
    {
        $data['header_columns'] = $this->header_columns;
        $inputs = $this->session->userdata();
        $qstr = array(
          'DATE(cctv_request_log.request_date) >='  => $this->date_libs->set_date_th($inputs['start_date']),
          'DATE(cctv_request_log.request_date) <='  => $this->date_libs->set_date_th($inputs['end_date']),
          'cctv_request_log.status !=' => 'disabled',
        );

        $results = $this->Cctv_request_log_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_cctv_request_log_table', $data);

    }

}
