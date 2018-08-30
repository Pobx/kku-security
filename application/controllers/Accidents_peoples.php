<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Accidents_peoples extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Accidents_peoples_model');

        $this->load->library('Date_libs');
    }

    private $head_topic_label           = 'สถิติอุบัติเหตุ';
    private $head_sub_topic_label_table = 'รายการ สถิติอุบัติเหตุ';
    private $head_sub_topic_label_form  = 'ฟอร์มบันทึกข้อมูล สถิติอุบัติเหตุ';
    private $header_columns             = array('ผู้ประสบเหตุ / คู่กรณี', 'ประเภทบุคลากร', 'บาดเจ็บ / เสียชีวิต', 'ชื่อ - สกุล', 'หน่วยงาน', 'แก้ไข', 'ลบ');

    private $success_message = 'บันทึกข้อมูลสำเร็จ';
    private $warning_message = 'ไม่สามารถทำรายการ กรุณลองใหม่อีกครั้ง';
    private $danger_message  = 'ลบข้อมูลสำเร็จ';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_table;
        $data['link_go_to_form'] = site_url('accidents_peoples/form_store');
        $data['link_go_to_remove'] = site_url('accidents_peoples/remove');
        $data['header_columns'] = $this->header_columns;

        $qstr = array('status !=' => 'disabled');
        $results = $this->Accidents_peoples_model->all($qstr);
        $data['results'] = $results['results'];
        $data['fields'] = $results['fields'];
        $data['content'] = 'accidents_peoples_table';

        // echo "<pre>", print_r($data['results']); exit();
        $this->load->view('template_layout', $data);
    }

    public function form_store()
    {
        $accident_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $data = $this->find($id);
        $data['accident_id'] = $accident_id;
        $data['head_topic_label'] = $this->head_topic_label;
        $data['head_sub_topic_label'] = $this->head_sub_topic_label_form;

        $data['link_back_to_table'] = site_url('accidents/form_store/' . $accident_id);
        $data['form_submit_data_url'] = site_url('accidents_peoples/store');
        $data['link_go_to_peoples_form'] = site_url('accidents_peoples/form_store');
        $data['link_go_to_peoples_remove'] = site_url('accidents_peoples/remove/' . $accident_id);

        $data['header_columns'] = $this->header_columns;
        $qstr = array(
            'accident_id' => $accident_id,
            'status !='   => 'disabled',
        );
        $peoples_results = $this->Accidents_peoples_model->all($qstr);
        $data['peoples_results'] = $peoples_results['results'];

        $data['content'] = 'accidents_peoples_form_store';

        // echo "<pre>", print_r($data); exit();
        $this->load->view('template_layout', $data);
    }

    public function store()
    {
        $inptus = $this->input->post();
        $results = $this->Accidents_peoples_model->store($inptus);

        $alert_type = ($results['query'] ? 'success' : 'warning');
        $alert_icon = ($results['query'] ? 'check' : 'warning');
        $alert_message = ($results['query'] ? $this->success_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);

        // redirect('accidents_peoples');
        redirect('accidents_peoples/form_store/' . $inptus['accident_id']);
    }

    private function find($id = 0)
    {
        $results = $this->Accidents_peoples_model->find($id);
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
        $accident_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $flag = $this->uri->segment(5);

        $results = $this->Accidents_peoples_model->remove($id);

        $alert_type = ($results['query'] ? 'danger' : 'warning');
        $alert_icon = ($results['query'] ? 'trash' : 'warning');
        $alert_message = ($results['query'] ? $this->danger_message : $this->warning_message);
        $this->session->set_flashdata('alert_type', $alert_type);
        $this->session->set_flashdata('alert_icon', $alert_icon);
        $this->session->set_flashdata('alert_message', $alert_message);
        $redirect_page = ($flag == 'main_form' ? 'accidents/form_store/' : 'accidents_peoples/form_store/');
        redirect($redirect_page . $accident_id);
    }
}
