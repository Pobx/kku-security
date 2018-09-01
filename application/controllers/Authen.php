<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Authen extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model');
    }

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
      $inputs['passwords'] = md5($inputs['passwords']);
      $inputs['status'] = 'active';

      $results = $this->Users_model->all($inputs);
      
      echo "<pre>", print_r($results);
    }
}
