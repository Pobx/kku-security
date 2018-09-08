<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Accidents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_model');
        // $this->load->model('Accidents_vehicles_model');
        // $this->load->model('Accidents_peoples_model');
        $this->load->model('Accidents_place_model');
        $this->load->model('Accidents_cause_model');

        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติอุบัติเหตุ';
    private $head_sub_topic_label_table = 'รายการ สถิติอุบัติเหตุ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติอุบัติเหตุ';
    private $head_sub_topic_vehicles_label  = 'รายการ รถยนต์ / รถจักรยานยนต์';
    private $head_sub_topic_peoples_label  = 'รายการ ผู้ประสบเหตุ / คู่กรณี';
    
    private $header_columns             = array('วันที่', 'ช่วงเวลา', 'สถานที่เกิดเหตุ', 'รถยนต์', 'รถจักรยานยนต์', 'รถที่เกิดเหตุ', 'สาเหตุ', 'บาดเจ็บ', 'เสียชีวิต', 'ผู้ประสบเหตุ / คู่กรณี', 'หน่วยงาน', 'บุคลากร', 'นักศึกษา', 'บุคคลภายใน', 'แก้ไข', 'ลบ');
    // private $header_columns_vehicles    = array('ประเภท', 'ทะเบียนรถ', 'สี', 'ยี่ห้อ', 'รุ่น', 'แก้ไข', 'ลบ');
    // private $header_columns_peoples     = array('ผู้ประสบเหตุ / คู่กรณี', 'ประเภทบุคลากร', 'บาดเจ็บ / เสียชีวิต', 'ชื่อ - สกุล', 'หน่วยงาน', 'แก้ไข', 'ลบ');
    
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('accidents/form_store');
        $data['link_go_to_remove'] = site_url('accidents/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('status !=' => 'disabled');
        $results = $this->Accidents_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'accidents_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);

        $data = $this->find($id); 
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        // $data['head_sub_topic_vehicles_label'] = $this->head_sub_topic_vehicles_label;
        // $data['head_sub_topic_peoples_label'] = $this->head_sub_topic_peoples_label;
        
        // $data['link_go_to_vehicles_form'] = site_url('accidents_vehicles/form_store/'.$id);
        // $data['link_go_to_vehicles_remove'] = site_url('accidents_vehicles/remove/'.$id);

        // $data['link_go_to_peoples_form'] = site_url('accidents_peoples/form_store/'.$id);
        // $data['link_go_to_peoples_remove'] = site_url('accidents_peoples/remove/'.$id);
        $data['link_back_to_table'] = site_url('accidents');
        $data['form_submit_data_url'] = site_url('accidents/store');

        // $data['header_columns_vehicles'] = $this->header_columns_vehicles;
        $qstr = array(
          'status ='=>'active'
        );

        // $vehicles_results = $this->Accidents_vehicles_model->all($qstr);
        // $data['vehicles_results'] = $vehicles_results['results'];
        
        // $data['header_columns_peoples'] = $this->header_columns_peoples;
        // $peoples_results = $this->Accidents_peoples_model->all($qstr);
        // $data['peoples_results'] = $peoples_results['results'];
        $accident_place = $this->Accidents_place_model->all($qstr);
        $data['accident_place'] = $accident_place['results'];

        $accident_cause = $this->Accidents_cause_model->all($qstr);
        $data['accident_cause'] = $accident_cause['results'];

        
        $data['content'] = 'accidents_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inptus = $this->input->post();
        $inptus['accident_date'] = $this->date_libs->set_date_th($inptus['accident_date']);
        $results = $this->Accidents_model->store($inptus);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        // redirect('accidents');
        redirect('accidents/form_store/'.$results['lastID']);
    }

    private function find($id = 0)
    {
        $results = $this->Accidents_model->find($id);
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
        $results = $this->Accidents_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('accidents');
    }
}
