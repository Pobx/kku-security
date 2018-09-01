<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_break_motorcycle_pad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Break_motorcycle_pad_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติการงัดเบาะรถจักยานยนต์';
    private $head_sub_topic_label_table = 'รายงาน สถิติการงัดเบาะรถจักยานยนต์';
    private $header_columns             = array('วันที่', 'ชื่อ - สกุล', 'ที่อยู่ผู้เสียหาย', 'สถานที่เกิดเหตุ', 'รายการของที่สูญหาย', 'หมายเหตุ');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] =(isset($inputs['start_date'])? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] =(isset($inputs['end_date'])? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] =  site_url('report_break_motorcycle_pad');
        $data['link_excel'] =  site_url('report_break_motorcycle_pad/export_excel');

        $qstr = array(
          'date_break >=' => $this->date_libs->set_date_th( $data['start_date']),
          'date_break <=' => $this->date_libs->set_date_th($data['end_date']),
          'status !=' => 'disabled'
        );

        $sess_inputs = array(
          'start_date' => $this->date_libs->set_date_th( $data['start_date']),
          'end_date' => $this->date_libs->set_date_th($data['end_date']),
        );
        $this->session->set_userdata($sess_inputs);

        $results = $this->Break_motorcycle_pad_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_break_motorcycle_pad_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel() {
      $data['header_columns'] = $this->header_columns;
      $inputs = $this->session->userdata();
      $qstr = array(
        'date_break >=' =>$inputs['start_date'],
        'date_break <=' =>$inputs['end_date'],
        'status !=' => 'disabled'
      );

        $results = $this->Break_motorcycle_pad_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_break_homes_table', $data);

    }

}
