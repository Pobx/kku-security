<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สถิติอุบัติเหตุ';
    private $head_sub_topic_label_table = 'รายงาน สถิติอุบัติเหตุ';
    private $header_columns             = array('วันที่', 'ช่วงเวลา', 'สถานที่เกิดเหตุ', 'รถยนต์', 'รถจักรยานยนต์', 'รถที่เกิดเหตุ', 'สาเหตุ', 'บาดเจ็บ', 'เสียชีวิต', 'ผู้ประสบเหตุ / คู่กรณี', 'หน่วยงาน', 'บุคลากร', 'นักศึกษา', 'บุคคลภายใน');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] =(isset($inputs['start_date'])? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] =(isset($inputs['end_date'])? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] =  site_url('report_accidents');
        $data['link_excel_monthly_summary'] =  site_url('report_accidents/export_excel_monthly_summary');
        $data['link_excel_monthly'] =  site_url('report_accidents/export_excel');
        
        $qstr = array(
          'accidents.accident_date >=' => $this->date_libs->set_date_th( $data['start_date']),
          'accidents.accident_date <=' => $this->date_libs->set_date_th($data['end_date']),
          'accidents.status !=' => 'disabled'
        );

        $sess_inputs = array(
          'start_date' => $this->date_libs->set_date_th( $data['start_date']),
          'end_date' => $this->date_libs->set_date_th($data['end_date']),
        );

        $this->session->set_userdata($sess_inputs);

        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'accident_date_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_accidents_table';

        echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel() {
      $data['header_columns'] = $this->header_columns;
      $inputs = $this->session->userdata();
      $qstr = array(
        'accidents.accident_date >=' =>$inputs['start_date'],
        'accidents.accident_date <=' =>$inputs['end_date'],
        'accidents.status !=' => 'disabled'
      );

        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_accidents_table', $data);
    }

    public function export_excel_monthly_summary() {
      $data['header_columns'] = $this->header_columns;
      $inputs = $this->session->userdata();
      $qstr = array(
        'accidents.accident_date >=' =>$inputs['start_date'],
        'accidents.accident_date <=' =>$inputs['end_date'],
        'accidents.status !=' => 'disabled'
      );

        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_accidents_table', $data);
    }

}
