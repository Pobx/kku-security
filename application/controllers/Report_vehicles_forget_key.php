<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Report_vehicles_forget_key extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Vehicles_forget_key_model');
        $this->load->model('Vehicles_forget_key_place_model');
        $this->load->library('Date_libs');
        $this->load->library('FilterPeoples');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'สถิติการลืมกุญแจ';
    private $head_sub_topic_label_table = 'รายงาน สถิติการลืมกุญแจ';
    private $header_columns             = array('วันที่', 'ชื่อ - สกุล', 'สังกัดหน่วยงาน', 'อายุ(ปี)', 'เบอร์ติดต่อ', 'สถานที่ลืมกุญแจ');
    private $header_excel_monthly_summary_columns = array('ลำดับ', 'สถานที่', 'จำนวน(ครั้ง)');

    public function index()
    {
        $inputs = $this->input->post();
        $data['start_date'] =(isset($inputs['start_date'])? $inputs['start_date'] : $this->date_libs->get_date_th(date('Y-m-d')));
        $data['end_date'] =(isset($inputs['end_date'])? $inputs['end_date'] : $this->date_libs->get_date_th(date('Y-m-d')));

        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['header_columns'] = $this->header_columns;
        $data['form_search_data_url'] =  site_url('report_vehicles_forget_key');
        $data['link_excel_monthly_summary'] =  site_url('report_vehicles_forget_key/export_excel_monthly_summary');
        $data['link_excel_monthly'] =  site_url('report_vehicles_forget_key/export_excel');

        $qstr = array(
          'vehicles_forget_key.date_forget_key >=' => $this->date_libs->set_date_th( $data['start_date']),
          'vehicles_forget_key.date_forget_key <=' => $this->date_libs->set_date_th($data['end_date']),
          'vehicles_forget_key.status !=' => 'disabled'
        );

        $sess_inputs = array(
          'start_date' => $this->date_libs->set_date_th( $data['start_date']),
          'end_date' => $this->date_libs->set_date_th($data['end_date']),
        );
        $this->session->set_userdata($sess_inputs);

        $results = $this->Vehicles_forget_key_model->all($qstr);
        $data['results'] = $results['results'];

        $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'date_forget_key_en');
        // $data['fields'] = $results['fields'];
        $data['count_students'] = $this->filterpeoples->filter($results['results'], 'student', 'people_type');
        $data['count_people_outside'] = $this->filterpeoples->filter($results['results'], 'people_outside', 'people_type');
        $data['count_people_inside'] = $this->filterpeoples->filter($results['results'], 'people_inside', 'people_type');
        $data['count_staff'] = $this->filterpeoples->filter($results['results'], 'staff', 'people_type');
        $data['count_staff'] += $data['count_people_inside'];
        $barchart_values_forget_keys = array(
          'data'=> array($data['count_students'], $data['count_people_outside'], $data['count_staff'],),
          'labels'          => array('นักศึกษา', 'บุคคลภายนอก', 'บุคลากร',),
          'type'            => 'bar',
          'dataset_label'   => 'ข้อมูล',
          'backgroundColor' => '#0073b7',
        );

        $data['barchart_values_forget_keys'] = json_encode($barchart_values_forget_keys);
        
        $data['content'] = 'report_vehicles_forget_key_table';

        // echo "<pre>", print_r($data['barchart_values_forget_keys']); exit();
        $this->load->view('template_layout', $data);
    }

    public function export_excel() {
      $data['header_columns'] = $this->header_columns;
      $inputs = $this->session->userdata();
      $qstr = array(
        'vehicles_forget_key.date_forget_key >=' =>$inputs['start_date'],
        'vehicles_forget_key.date_forget_key <=' =>$inputs['end_date'],
        'vehicles_forget_key.status !=' => 'disabled'
      );

        $results = $this->Vehicles_forget_key_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_vehicles_forget_key', $data);

    }

    public function export_excel_monthly_summary() {
      $data['header_columns'] = $this->header_excel_monthly_summary_columns;
      $inputs = $this->session->userdata();

      $qstr = array(
        'vehicles_forget_key.date_forget_key >=' =>$inputs['start_date'],
        'vehicles_forget_key.date_forget_key <=' =>$inputs['end_date'],
        'vehicles_forget_key.status !=' => 'disabled'
      );

        $distinct_place = $this->Vehicles_forget_key_model->distinct_place($qstr);
        $data['place'] = $distinct_place['results'];
     
        $results = array();
        foreach ($data['place'] as $key => $value) {
          $qstr['vehicles_forget_key_place_id'] = $value['vehicles_forget_key_place_id'];
          $results_count = $this->Vehicles_forget_key_model->all($qstr);

          $qstr_place = array('id'=>$value['vehicles_forget_key_place_id']);
          $results_place = $this->Vehicles_forget_key_place_model->all($qstr_place);
          $place_name = (isset($results_place['results'][0]['name'])? $results_place['results'][0]['name'] : '');

          $results[] = array(
            'results_count'=>$results_count['rows'],
            'place_name'=>$place_name
          );
        }

        $data['results'] = $results;
        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('excel_vehicles_forget_key_monthly_summary_table', $data);
    }

}
