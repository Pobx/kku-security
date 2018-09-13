<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Evaluation extends CI_Controller
{
  public function __construct() {
    parent::__construct();

    $this->load->model('Evaluation_model');
    $this->load->model('Services_model');
    $this->load->model('Faculty_model');
    $this->load->model('Personals_model');

    $this->load->library('Date_libs');
  }

  private $head_topic_label = 'แบบประเมินความพึงพอใจ';
  private $head_sub_topic_label_table = 'ผลสรุปแบบประเมินความพึงพอใจ กองป้องกันและรักษาความปลอดภัย มหาวิทยาลัยขอนแก่น';
  private $head_sub_topic_label_form = 'แบบประเมินความพึงพอใจ กองป้องกันและรักษาความปลอดภัย มหาวิทยาลัยขอนแก่น ';
  private $header_columns = array('วันที่',  'เพศ', 'อายุ','สถานะ','สังกัด', 'ข้อเสอแนะ', 'ดูข้อมูล','ลบ');
  private $success_message = 'บันทึกข้อมูลสำเร็จ';
  private $warning_message = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
  private $danger_message = 'ลบข้อมูลสำเร็จ';

    // public function index()
    // {
    //   $data['form_submit_data_url_modal'] =site_url('evaluation/store');
    //   $data['head_topic_label'] = $this->head_topic_label;
    //   $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
    //   $data['link_go_to_form'] = site_url('evaluation/form_store');
    //   $data['link_go_to_remove'] = site_url('evaluation/remove');
    //   $data['header_columns'] = $this->header_columns;
      
    //   $qstr = array('faculty.status !='=>'disabled');
    //   $results = $this->Evaluation_model->all($qstr);
    //   $data['results'] = $results['results'];
    //   $data['fields'] = $results['fields'];
    //   $data['content'] = 'evaluation_table';

    //   $this->load->view('template_layout', $data);
    // }

    public function form_store() {

      $id = $this->uri->segment(3);
      $data = $this->find($id);
 
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
      $data['link_back_to_table'] = site_url('evaluation');
      $data['form_submit_data_url'] = site_url('evaluation/store');
      
      $data['content'] = 'evaluation_form';
      $personals = $this->Personals_model->all();
      $data['personals'] = $personals['results'];

      $faculty = $this->Faculty_model->all();
      $data['faculty'] = $faculty['results'];

      $service = $this->Services_model->all();
      $data['service'] = $service['results'];

    //  echo "<pre>", print_r($data); exit();
      $this->load->view('template_layout_evaluation', $data);
    }

    public function store() {
      $inptus = $this->input->post();
      // echo "<pre>", print_r($inptus); exit();

      $results = $this->Evaluation_model->store($inptus);

      $alert_type = ($results['query']? 'success' : 'warning');
      $alert_icon = ($results['query']? 'check' : 'warning');
      $alert_message = ($results['query']? $this->success_message : $this->warning_message);
      $this->session->set_flashdata('alert_type', $alert_type);
      $this->session->set_flashdata('alert_icon', $alert_icon);
      $this->session->set_flashdata('alert_message', $alert_message);

      redirect('evaluation');
    }

    private function find($id = 0) {
      $results = $this->Evaluation_model->find($id);
      $values = $results['results'];
      $service = $results['service'];
      $fields = $results['fields'];
      $rows = $results['rows'];
      $data = array();

      foreach ($fields as $key => $value) {
        if ($rows <= 0) {
          $data[$value] = '';
        } else {
          $data[$value] = $values->$value;
        }
      }  
      $arr['fields'] = $data; 
      $arr['service_array'] = $service; 
      return $arr;
    }
    
    public function remove() {
      $id = $this->uri->segment(3);
      $results = $this->Evaluation_model->remove($id);

      $alert_type = ($results['query']? 'danger' : 'warning');
      $alert_icon = ($results['query']? 'trash' : 'warning');
      $alert_message = ($results['query']? $this->danger_message : $this->warning_message);
      $this->session->set_flashdata('alert_type', $alert_type);
      $this->session->set_flashdata('alert_icon', $alert_icon);
      $this->session->set_flashdata('alert_message', $alert_message);

      redirect('evaluation');
    }
}
