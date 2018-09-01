<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Authen extends CI_Controller
{
    public function index()
    {
      $data['form_submit'] = site_url('authen/login');
      $data['attr'] = array(
          'id' => 'my_form_submit'
          , 'class' => 'form-horizontal'
          , 'role' => 'form'
          , 'autocomplete' => 'off',
      );
        $this->load->view('template_authen', $data);
    }

    public function login() {
      $inputs = $this->input->post();
      $inputs['status'] = 'active';
      
      echo "<pre>", print_r($inputs);
    }
}
