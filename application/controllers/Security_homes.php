<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Security_homes extends CI_Controller
{

    public function index()
    {
      $data['head_topic_label'] = 'โครงการฝากบ้าน';
      $data['head_sub_topic_label'] = 'รายการ โครงการฝากบ้าน';
      $data['content'] = 'security_homes_table';
      
      $this->load->view('template_layout', $data);
    }
}
