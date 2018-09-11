<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Security_homes extends CI_Controller
{
  public function __construct() {
    parent::__construct();

    $this->load->model('Security_home_model');
    $this->load->library('Date_libs');
    $this->load->library('FilterBarChartData');
  }

  private $head_topic_label = 'โครงการฝากบ้าน';
  private $head_sub_topic_label_table = 'รายการ โครงการฝากบ้าน';
  private $head_sub_topic_label_form = 'ฟอร์มบันทึกข้อมูล โครงการฝากบ้าน';
  private $header_columns = array('วันที่',  'ชื่อ - สกุล', 'ตำแหน่ง', 'สังกัดหน่วยงาน', 'สำนักงาน / ศูนย์', 'ที่อยู่ / หมู่บ้าน', 'การส่งมอบ', 'แก้ไข', 'ลบ');
  private $success_message = 'บันทึกข้อมูลสำเร็จ';
  private $warning_message = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
  private $danger_message = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
      $data['link_go_to_form'] = site_url('security_homes/form_store');
      $data['link_go_to_remove'] = site_url('security_homes/remove');
      $data['header_columns'] = $this->header_columns;
      
      $qstr = array(
        'YEAR(start_date)'=>date('Y'),
        'status !='=>'disabled'
      );

      $results = $this->Security_home_model->all($qstr);
      $data['results'] = $results['results'];
      $data['bar_chart_data'] = $this->filterbarchartdata->filter($results['results'], 'start_date_en');
      $data['fields'] = $results['fields'];
      $data['content'] = 'security_homes_table';

      // echo "<pre>", print_r($data['bar_chart_data']); exit();
      $this->load->view('template_layout', $data);
    }

    public function form_store() {
      $id = $this->uri->segment(3);

      $data = $this->find($id);
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
      $data['link_back_to_table'] = site_url('security_homes');
      $data['form_submit_data_url'] = site_url('security_homes/store');
      
      $data['content'] = 'security_homes_form_store';

      // echo "<pre>", print_r($data); exit();
      $this->load->view('template_layout', $data);
    }

    public function store() {
      $inptus = $this->input->post();
      $inptus['start_date'] = $this->date_libs->set_date_th($inptus['start_date']);
      $inptus['end_date'] = $this->date_libs->set_date_th($inptus['end_date']);
      $results = $this->Security_home_model->store($inptus);

      $alert_type = ($results['query']? 'success' : 'warning');
      $alert_icon = ($results['query']? 'check' : 'warning');
      $alert_message = ($results['query']? $this->success_message : $this->warning_message);
      $this->session->set_flashdata('alert_type', $alert_type);
      $this->session->set_flashdata('alert_icon', $alert_icon);
      $this->session->set_flashdata('alert_message', $alert_message);

      redirect('security_homes');
    }

    private function find($id = 0) {
      $results = $this->Security_home_model->find($id);
      $values = $results['results'];
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

      return $data;
    }
    
    public function remove() {
      $id = $this->uri->segment(3);
      $results = $this->Security_home_model->remove($id);

      $alert_type = ($results['query']? 'danger' : 'warning');
      $alert_icon = ($results['query']? 'trash' : 'warning');
      $alert_message = ($results['query']? $this->danger_message : $this->warning_message);
      $this->session->set_flashdata('alert_type', $alert_type);
      $this->session->set_flashdata('alert_icon', $alert_icon);
      $this->session->set_flashdata('alert_message', $alert_message);

      redirect('security_homes');
    }
}
