<?php
// defined('BASEPATH') || exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model');
        
        $this->load->library('Date_libs');
        $this->load->library('FilterBarChartData');
    }

    private $head_topic_label           = 'ข้อมูลผู้ใช้งาน ';
    private $head_sub_topic_label_table = 'รายการ ข้อมูลผู้ใช้งาน ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล ข้อมูลผู้ใช้งาน ';
    private $header_columns             = array('Username', 'ชื่อ - สกุล', 'สิทธิ์การใช้งาน', 'สถานะ', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';
    private $roles_lists = array('admin', 'security');

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('users/form_store');
        $data['link_go_to_remove'] = site_url('users/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array(
          'users.status' => 'active'
        );

        $results = $this->Users_model->all($qstr);
        $data['results'] = $results['results'];

        $data['content'] = 'users_table';
        
        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $sess_data = $this->session->userdata();
        $id = $this->uri->segment(3);
        $data = $this->find($id);

        $data['roles_lists'] = $this->roles_lists;
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('users');
        $data['form_submit_data_url'] = site_url('users/store');

        $data['content'] = 'users_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        
        $inputs = $this->input->post();
        if ($inputs['passwords'] =='') {
          unset($inputs['passwords']);
        }
        // echo "<pre>", print_r($inputs); exit();
        $results = $this->Users_model->store($inputs);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);
      
        redirect('users');
    }

    private function find($id = 0)
    {
        $results = $this->Users_model->find($id);
        $values = $results['results'];
        $fields = $results['fields'];
        $rows = $results['rows'];
        $data = array();

        foreach ($fields as $key => $value)
        {
            if ($rows <= 0)
            {
                $data[$value] = '';
            }
            else
            {
                $data[$value] = $values->$value;
            }
        }

        return $data;
    }

    public function remove()
    {
        $id = $this->uri->segment(3);
        $results = $this->Users_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('users');
    }
}
