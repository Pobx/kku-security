<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Security_homes extends CI_Controller
{
  private $head_topic_label = 'โครงการฝากบ้าน';
  private $head_sub_topic_label_table = 'รายการ โครงการฝากบ้าน';
  private $head_sub_topic_label_form = 'ฟอร์มบันทึกข้อมูล โครงการฝากบ้าน';

    public function index()
    {
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
      $data['link_add_new'] = site_url('security_homes/form_add_new');
      $data['content'] = 'security_homes_table';
      
      
      $this->load->view('template_layout', $data);
    }

    public function form_add_new() {
      $data['head_topic_label'] = $this->head_topic_label;
      $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
      $data['content'] = 'security_homes_form_add_new';

      $this->load->view('template_layout', $data);
    }
}
