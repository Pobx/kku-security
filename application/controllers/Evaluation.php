<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Evaluation extends CI_Controller
{
  public function __construct() {
    parent::__construct();

    $this->load->model('Evaluation_model');
    $this->load->model('Evaluation_services_model');
    
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

    public function form_store() {
 
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
      $data['link_back_to_table'] = site_url('evaluation');
      $data['form_submit_data_url'] = site_url('evaluation/store');
      
      $data['content'] = 'evaluation_form';
      $personals = $this->Personals_model->all();
      $data['personals'] = $personals['results'];

      $faculty = $this->Faculty_model->all();
      $data['faculty'] = $faculty['results'];

      $services = $this->Services_model->all();
      $data['services'] = $services['results'];

    //  echo "<pre>", print_r($data); exit();
      $this->load->view('template_layout_evaluation', $data);
    }

    public function store() {
      $inputs = $this->input->post();
      // echo "<pre>", print_r($inputs); exit();

      $services = $inputs['service'];
      unset($inputs['service']);

      $inputs['eval_date'] = date('Y-m-d H:i:s');
      $results = $this->Evaluation_model->store($inputs);
      $evaluation_id = $results['lastID'];
      $this->store_services($evaluation_id, $services);

      $alert_type = ($results['query']? 'success' : 'warning');
      $alert_icon = ($results['query']? 'check' : 'warning');
      $alert_message = ($results['query']? $this->success_message : $this->warning_message);
      $this->session->set_flashdata('alert_type', $alert_type);
      $this->session->set_flashdata('alert_icon', $alert_icon);
      $this->session->set_flashdata('alert_message', $alert_message);

      redirect('evaluation/form_store');
      
    }

    private function store_services($evaluation_id, $services) {
      foreach ($services as $key => $value) {
        $inputs = array(
          'id'=>'',
          'evaluation_id'=>$evaluation_id,
          'service_id'=>$value,
          'status'=>'active'
        );

        $this->Evaluation_services_model->store($inputs);
      }
    }
}
