<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_vehicles_forget_key extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Vehicles_forget_key_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สถิติการลืมกุญแจ';
    private $head_sub_topic_label_table = 'รายงาน สถิติการลืมกุญแจ';
    private $header_columns             = array('วันที่', 'ชื่อ - สกุล', 'สังกัดหน่วยงาน', 'อายุ(ปี)', 'เบอร์ติดต่อ', 'สถานที่ลืมกุญแจ');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] =(isset($inputs['start_date'])? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] =(isset($inputs['end_date'])? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] =  site_url('report_vehicles_forget_key');
        $data['link_excel'] =  site_url('report_vehicles_forget_key/export_excel');

        $qstr = array(
          'date_forget_key >=' => $this->date_libs->set_date_th( $data['start_date']),
          'date_forget_key <=' => $this->date_libs->set_date_th($data['end_date']),
          'status !=' => 'disabled'
        );

        $sess_inputs = array(
          'start_date' => $this->date_libs->set_date_th( $data['start_date']),
          'end_date' => $this->date_libs->set_date_th($data['end_date']),
        );
        $this->session->set_userdata($sess_inputs);

        $results = $this->Vehicles_forget_key_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'date_forget_key_en');
        $data['fields'] = $results['fields'];
        $data['content'] = 'report_vehicles_forget_key_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel() {
      $data['header_columns'] = $this->header_columns;
      $inputs = $this->session->userdata();
      $qstr = array(
        'date_forget_key >=' =>$inputs['start_date'],
        'date_forget_key <=' =>$inputs['end_date'],
        'status !=' => 'disabled'
      );

        $results = $this->Vehicles_forget_key_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_vehicles_forget_key', $data);

    }

}
