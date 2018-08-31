<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        $this->load->library('Date_libs');
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

        $qstr = array(
          'accident_date >=' => $this->date_libs->set_date_th( $data['start_date']),
          'accident_date <=' => $this->date_libs->set_date_th($data['end_date']),
          'status !=' => 'disabled'
        );
        
        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_accidents_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

}
