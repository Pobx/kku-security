<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Security_homes extends CI_Controller
{
  public function __construct() {
    parent::__construct();

    $this->load->model('Security_home_model');
    $this->load->library('Date_libs');
  }

  private $head_topic_label = 'โครงการฝากบ้าน';
  private $head_sub_topic_label_table = 'รายการ โครงการฝากบ้าน';
  private $head_sub_topic_label_form = 'ฟอร์มบันทึกข้อมูล โครงการฝากบ้าน';

    public function index()
    {
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
      $data['link_add_new'] = site_url('security_homes/form_add_new');
      
      $results = $this->Security_home_model->all();
      $data['results'] = $results['results'];
      $data['content'] = 'security_homes_table';
      
      echo "<pre>", print_r($data['results']); exit();
      $this->load->view('template_layout', $data);
    }

    public function form_add_new() {
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
      $data['link_back_to_table'] = site_url('security_homes');
      $data['form_submit_data_url'] = site_url('security_homes/store');
      $data['content'] = 'security_homes_form_add_new';

      $this->load->view('template_layout', $data);
    }

    public function store() {
      $inptus = $this->input->post();
      $inptus['start_date'] = $this->date_libs->set_date_th($inptus['start_date']);
      $inptus['end_date'] = $this->date_libs->set_date_th($inptus['end_date']);
      $results = $this->Security_home_model->store($inptus);

      redirect('security_homes');
    }
}
