<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Student_do_not_wear_helmet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Student_do_not_wear_helmet_model');
        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติไม่สวมหมวกนิรภัย';
    private $head_sub_topic_label_table = 'รายการ สถิติไม่สวมหมวกนิรภัย';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติไม่สวมหมวกนิรภัย';
    private $header_columns             = array('วันที่', 'สถานที่', 'ชื่อ - สกุล', 'รหัสนักศึกษา', 'บัตรประชาชน', 'สังกัด / คณะ', 'ประเภทรถจักยานยนต์', 'แก้ไข', 'ลบ');
    private $success_message            = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message            = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message             = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('student_do_not_wear_helmet/form_store');
        $data['link_go_to_remove'] = site_url('student_do_not_wear_helmet/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('status !=' => 'disabled');
        $results = $this->Student_do_not_wear_helmet_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'student_do_not_wear_helmet_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $id = $this->uri->segment(3);

        $data = $this->find($id);
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;
        $data['link_back_to_table'] = site_url('student_do_not_wear_helmet');
        $data['form_submit_data_url'] = site_url('student_do_not_wear_helmet/store');

        $data['content'] = 'student_do_not_wear_helmet_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inptus = $this->input->post();
        $inptus['date_forget_key'] = $this->date_libs->set_date_th($inptus['date_forget_key']);
        $results = $this->Student_do_not_wear_helmet_model->store($inptus);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('student_do_not_wear_helmet');
    }

    private function find($id = 0)
    {
        $results = $this->Student_do_not_wear_helmet_model->find($id);
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
        $results = $this->Student_do_not_wear_helmet_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        redirect('student_do_not_wear_helmet');
    }
}
